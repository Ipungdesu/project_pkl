<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();
        abort_unless($user instanceof User, 403);
        $user->load(['profile', 'internDetail']);

        return view('applicant.profile.edit', [
            'profile' => $user->profile,
            'internDetail' => $user->internDetail,
            'isMagang' => $user->isMagang(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();
        abort_unless($user instanceof User, 403);

        $profile = $user->profile()->first();
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'nik' => [
                'required',
                'digits:16',
                function (string $attribute, mixed $value, \Closure $fail) use ($profile): void {
                    $query = Profile::query()->where(
                        'nik_hash',
                        hash_hmac('sha256', (string) $value, (string) config('app.key')),
                    );

                    if ($profile !== null) {
                        $query->whereKeyNot($profile->getKey());
                    }

                    if ($query->exists()) {
                        $fail('NIK ini telah terdaftar pada akun lain.');
                    }
                },
            ],
            'phone' => ['required', 'string', 'max:30'],
            'birth_place' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date', 'before_or_equal:today'],
            'address' => ['required', 'string', 'max:2000'],
            'last_education' => ['required', 'string', 'max:100'],
            'university' => [$user->isMagang() ? 'required' : 'exclude', 'string', 'max:255'],
            'major' => [$user->isMagang() ? 'required' : 'exclude', 'string', 'max:255'],
            'student_id_number' => [$user->isMagang() ? 'required' : 'exclude', 'string', 'max:100'],
            'semester' => [$user->isMagang() ? 'required' : 'exclude', 'integer', 'between:1,14'],
        ]);

        try {
            DB::transaction(function () use ($request, $user, $validated): void {
                $profile = $user->profile()->firstOrNew();
                $profile->fill([
                    'full_name' => $validated['full_name'],
                    'birth_place' => $validated['birth_place'],
                    'birth_date' => $validated['birth_date'],
                    'address' => $validated['address'],
                    'last_education' => $validated['last_education'],
                ]);
                $profile->nik_encrypted = $validated['nik'];
                $profile->phone_encrypted = $validated['phone'];
                $profile->save();

                if ($user->isMagang()) {
                    $user->internDetail()->updateOrCreate([], [
                        'university' => $validated['university'],
                        'major' => $validated['major'],
                        'student_id_number' => $validated['student_id_number'],
                        'semester' => $validated['semester'],
                    ]);
                }

                ActivityLog::create([
                    'user_id' => $user->getKey(),
                    'category' => 'application',
                    'action' => 'profile_updated',
                    'entity_type' => 'profiles',
                    'entity_id' => $profile->getKey(),
                    'ip_address' => $request->ip(),
                ]);
            });
        } catch (QueryException $exception) {
            $isDuplicateNik = ($exception->errorInfo[0] ?? null) === '23505'
                && str_contains($exception->getMessage(), 'profiles_nik_hash_unique');

            if (! $isDuplicateNik) {
                throw $exception;
            }

            throw ValidationException::withMessages([
                'nik' => 'NIK ini telah terdaftar pada akun lain.',
            ]);
        }

        return redirect()
            ->route('applicant.profile.edit')
            ->with('status', 'Profil berhasil diperbarui.');
    }
}
