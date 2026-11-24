<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'nama',
    'telepon',
    'tanggal_registrasi',
    'status',
    'created_by',
])]
class CalonNasabah extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tanggal_registrasi' => 'date',
        ];
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get initials of name for avatar badges.
     */
    public function getInitialsAttribute(): string
    {
        $words = preg_split('/\s+/', trim($this->nama));
        if (empty($words)) {
            return 'CN';
        }

        $initials = '';
        foreach (array_slice($words, 0, 2) as $w) {
            $initials .= mb_strtoupper(mb_substr($w, 0, 1));
        }

        return $initials ?: 'CN';
    }
}
