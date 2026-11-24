<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Application;
use App\Models\ApplicationDocument;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use RuntimeException;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;

class ApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        abort_unless($user instanceof User, 403);

        return view('applicant.applications.index', [
            'applications' => $user->applications()
                ->with(['jobOpening', 'statusHistory'])
                ->latest('id')
                ->get(),
        ]);
    }

    public function show(Application $application): View
    {
        Gate::authorize('view', $application);

        $application->load(['jobOpening', 'documents', 'statusHistory']);

        return view('applicant.applications.show', [
            'application' => $application,
            'requiredDocuments' => $this->requiredDocuments($application->applicant),
        ]);
    }

    public function storeDocument(Request $request, Application $application): RedirectResponse
    {
        Gate::authorize('update', $application);

        $requiredDocuments = $this->requiredDocuments($application->applicant);
        $validated = $request->validate([
            'doc_type' => ['required', Rule::in($requiredDocuments)],
            'file' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'extensions:pdf,jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        $path = null;
        $previousPath = null;
        try {
            DB::transaction(function () use ($request, $application, $validated, &$path, &$previousPath): void {
                $lockedApplication = Application::query()->lockForUpdate()->findOrFail($application->getKey());
                Gate::authorize('update', $lockedApplication);

                $file = $request->file('file');
                $fileName = Str::uuid()->toString().'.'.$file->extension();
                $path = $file->storeAs('applications/'.$application->getKey(), $fileName, 'local');

                if (! is_string($path)) {
                    throw new RuntimeException('Berkas tidak dapat disimpan ke penyimpanan privat.');
                }

                $document = $lockedApplication->documents()
                    ->where('doc_type', $validated['doc_type'])
                    ->first();
                $previousPath = $document?->file_path;

                $document = $lockedApplication->documents()->updateOrCreate(
                    ['doc_type' => $validated['doc_type']],
                    [
                        'file_path' => $path,
                        'original_name' => basename($file->getClientOriginalName()),
                    ],
                );

                ActivityLog::create([
                    'user_id' => $request->user()->getKey(),
                    'category' => 'document',
                    'action' => 'document_uploaded',
                    'entity_type' => 'application_documents',
                    'entity_id' => $document->getKey(),
                    'ip_address' => $request->ip(),
                    'metadata' => ['application_id' => $application->getKey(), 'doc_type' => $validated['doc_type']],
                ]);
            });
        } catch (Throwable $exception) {
            if (is_string($path) && ! Storage::disk('local')->delete($path)) {
                report(new RuntimeException('Berkas gagal dibersihkan setelah penyimpanan dibatalkan.'));
            }

            throw $exception;
        }

        if ($previousPath !== null && ! Storage::disk('local')->delete($previousPath)) {
            report(new RuntimeException('Berkas lama tidak dapat dihapus setelah penggantian.'));
        }

        return redirect()
            ->route('applicant.applications.show', $application)
            ->with('status', 'Berkas berhasil diunggah.');
    }

    public function submit(Request $request, Application $application): RedirectResponse
    {
        Gate::authorize('update', $application);

        $user = $request->user();
        abort_unless($user instanceof User, 403);
        $requiredDocuments = $this->requiredDocuments($user);

        $submitted = DB::transaction(function () use ($request, $application, $requiredDocuments): bool {
            $lockedApplication = Application::query()->lockForUpdate()->findOrFail($application->getKey());
            Gate::authorize('update', $lockedApplication);

            $uploadedDocuments = $lockedApplication->documents()->get(['doc_type', 'file_path']);

            foreach ($requiredDocuments as $requiredDocument) {
                $document = $uploadedDocuments->firstWhere('doc_type', $requiredDocument);

                if ($document === null || ! Storage::disk('local')->exists($document->file_path)) {
                    return false;
                }
            }

            $lockedApplication->update([
                'status' => 'submitted',
                'submitted_at' => now(),
            ]);

            ActivityLog::create([
                'user_id' => $request->user()->getKey(),
                'category' => 'application',
                'action' => 'application_submitted',
                'entity_type' => 'applications',
                'entity_id' => $lockedApplication->getKey(),
                'ip_address' => $request->ip(),
            ]);

            return true;
        });

        if (! $submitted) {
            return redirect()
                ->route('applicant.applications.show', $application)
                ->withErrors(['documents' => 'Lengkapi seluruh berkas wajib sebelum mengirim lamaran.']);
        }

        return redirect()
            ->route('applicant.applications.show', $application)
            ->with('status', 'Lamaran berhasil dikirim.');
    }

    public function download(ApplicationDocument $document): StreamedResponse
    {
        $document->loadMissing('application');
        Gate::authorize('view', $document->application);

        $disk = Storage::disk('local');
        abort_unless($disk->exists($document->file_path), 404);

        return $disk->download(
            $document->file_path,
            $document->original_name ?? basename($document->file_path),
        );
    }

    /**
     * @return array<int, string>
     */
    private function requiredDocuments(User $user): array
    {
        return $user->isMagang()
            ? ['cv', 'ktp', 'transkrip']
            : ['cv', 'ktp'];
    }
}
