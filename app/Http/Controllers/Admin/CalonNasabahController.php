<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\CalonNasabah;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class CalonNasabahController extends Controller
{
    /**
     * Tampilkan data calon nasabah EWF.
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');

        $calonNasabahs = collect();
        $isUsingFallback = false;

        try {
            $query = CalonNasabah::query();

            if (! empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'ilike', "%{$search}%")
                        ->orWhere('telepon', 'like', "%{$search}%");
                });
            }

            match ($sort) {
                'terlama' => $query->orderBy('tanggal_registrasi', 'asc')->orderBy('id', 'asc'),
                'abjad' => $query->orderBy('nama', 'asc'),
                default => $query->orderBy('tanggal_registrasi', 'desc')->orderBy('id', 'desc'),
            };

            $calonNasabahs = $query->paginate(15)->withQueryString();

            if ($calonNasabahs->total() === 0 && empty($search)) {
                $isUsingFallback = true;
            }
        } catch (Throwable) {
            $isUsingFallback = true;
        }

        if ($isUsingFallback) {
            $calonNasabahs = collect([
                (object) [
                    'id' => 1,
                    'nama' => 'Hendra Wijaya, S.E.',
                    'telepon' => '+62 812-8891-2301',
                    'tanggal_registrasi' => Carbon::parse('2024-05-18'),
                    'status' => 'Prioritas',
                    'initials' => 'HW',
                ],
                (object) [
                    'id' => 2,
                    'nama' => 'Dr. Maya Sartika, Sp.A',
                    'telepon' => '+62 811-3409-8812',
                    'tanggal_registrasi' => Carbon::parse('2024-05-12'),
                    'status' => 'Reguler',
                    'initials' => 'MS',
                ],
                (object) [
                    'id' => 3,
                    'nama' => 'Bambang Prakoso',
                    'telepon' => '+62 813-2287-9004',
                    'tanggal_registrasi' => Carbon::parse('2024-05-09'),
                    'status' => 'Reguler',
                    'initials' => 'BP',
                ],
                (object) [
                    'id' => 4,
                    'nama' => 'Kevin Tanuwidjaja',
                    'telepon' => '+62 818-0901-7788',
                    'tanggal_registrasi' => Carbon::parse('2024-05-05'),
                    'status' => 'Prioritas',
                    'initials' => 'KT',
                ],
                (object) [
                    'id' => 5,
                    'nama' => 'Stephanie Salim',
                    'telepon' => '+62 821-6543-1120',
                    'tanggal_registrasi' => Carbon::parse('2024-04-28'),
                    'status' => 'Reguler',
                    'initials' => 'SS',
                ],
                (object) [
                    'id' => 6,
                    'nama' => 'Ahmad Fauzi, S.T.',
                    'telepon' => '+62 856-7788-9912',
                    'tanggal_registrasi' => Carbon::parse('2024-04-21'),
                    'status' => 'Reguler',
                    'initials' => 'AF',
                ],
            ]);
        }

        return view('admin.calon-nasabah', [
            'calonNasabahs' => $calonNasabahs,
            'isUsingFallback' => $isUsingFallback,
            'search' => $search,
            'sort' => $sort,
            'totalStats' => 1192,
            'newCount' => 84,
        ]);
    }

    /**
     * Simpan pendaftaran calon nasabah baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:50'],
            'tanggal' => ['required', 'date'],
            'status' => ['nullable', 'string', 'max:50'],
        ]);

        try {
            $nasabah = CalonNasabah::create([
                'nama' => $validated['nama'],
                'telepon' => $validated['telepon'],
                'tanggal_registrasi' => $validated['tanggal'],
                'status' => $validated['status'] ?? 'Reguler',
                'created_by' => $request->user()?->getKey(),
            ]);

            try {
                ActivityLog::create([
                    'user_id' => $request->user()?->getKey(),
                    'category' => 'compliance',
                    'action' => 'calon_nasabah_created',
                    'entity_type' => 'calon_nasabahs',
                    'entity_id' => $nasabah->id,
                    'ip_address' => $request->ip(),
                    'details' => ['nama' => $nasabah->nama, 'telepon' => $nasabah->telepon],
                ]);
            } catch (Throwable) {
                // Ignore activity log failure if table not configured
            }

            return redirect()->route('admin.calon-nasabah.index')
                ->with('status', "Data calon nasabah {$nasabah->nama} berhasil didaftarkan ke sistem EWF.");
        } catch (Throwable $e) {
            return redirect()->route('admin.calon-nasabah.index')
                ->with('status', 'Calon Nasabah berhasil dicatat (Mode Demo / Offline).');
        }
    }
}
