<?php

namespace App\Models;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use RuntimeException;

#[Fillable([
    'applicant_id',
    'job_opening_id',
    'status',
    'reviewed_by',
    'admin_note',
    'submitted_at',
    'reviewed_at',
])]
class Application extends Model
{
    public const REVIEWABLE_STATUSES = ['submitted', 'in_review', 'interview'];

    /**
     * @var array<string, list<string>>
     */
    public const STATUS_TRANSITIONS = [
        'submitted' => ['in_review', 'interview', 'accepted', 'rejected'],
        'in_review' => ['interview', 'accepted', 'rejected'],
        'interview' => ['accepted', 'rejected'],
    ];

    protected function casts(): array
    {
        return [
            'submitted_at' => 'datetime',
            'reviewed_at' => 'datetime',
        ];
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function jobOpening(): BelongsTo
    {
        return $this->belongsTo(JobOpening::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(ApplicationDocument::class);
    }

    public function statusHistory(): HasMany
    {
        return $this->hasMany(ApplicationStatusHistory::class)
            ->oldest('created_at')
            ->oldest('id');
    }

    public function internPlacement(): HasOne
    {
        return $this->hasOne(InternPlacement::class);
    }

    public function accept(User $admin, ?string $note = null): void
    {
        $this->ensureCanBeReviewedBy($admin);

        try {
            DB::select('select fn_accept_application(?, ?, ?)', [
                $this->getKey(),
                $admin->getKey(),
                $note,
            ]);
        } catch (QueryException $exception) {
            throw new RuntimeException('Unable to accept the application.', previous: $exception);
        }
    }

    public function reject(User $admin, string $note): void
    {
        $this->ensureCanBeReviewedBy($admin);

        if (trim($note) === '') {
            throw new RuntimeException('Rejection note is required.');
        }

        try {
            DB::transaction(function () use ($admin, $note): void {
                $locked = self::query()->lockForUpdate()->findOrFail($this->getKey());

                if (! in_array($locked->status, self::REVIEWABLE_STATUSES, true)) {
                    throw new RuntimeException('Lamaran ini sudah diproses dan tidak dapat ditolak.');
                }

                $locked->forceFill([
                    'status' => 'rejected',
                    'reviewed_by' => $admin->getKey(),
                    'reviewed_at' => now(),
                    'admin_note' => $note,
                ])->save();

                $this->refresh();
            });
        } catch (QueryException $exception) {
            throw new RuntimeException('Unable to reject the application.', previous: $exception);
        }
    }

    public function canTransitionTo(string $status): bool
    {
        return in_array($status, self::STATUS_TRANSITIONS[$this->status] ?? [], true);
    }

    private function ensureCanBeReviewedBy(User $admin): void
    {
        if (! $admin->isAdmin() && ! $admin->isOperator()) {
            throw new AuthorizationException('Only admins and operators can review applications.');
        }
    }
}
