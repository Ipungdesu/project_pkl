<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreJobOpeningRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();

        return $user instanceof User && ($user->isAdmin() || $user->isOperator());
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:magang,kerja'],
            'description' => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'deadline' => ['nullable', 'date', 'after_or_equal:today'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }
}
