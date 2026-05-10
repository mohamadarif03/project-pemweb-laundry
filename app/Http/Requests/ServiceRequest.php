<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'estimated_days' => 'required|integer|min:1',
            'description' => 'nullable|string|max:500',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama layanan wajib diisi.',
            'name.max' => 'Nama layanan maksimal 255 karakter.',
            'price_per_kg.required' => 'Harga per kg wajib diisi.',
            'price_per_kg.numeric' => 'Harga harus berupa angka.',
            'price_per_kg.min' => 'Harga minimal 0.',
            'estimated_days.required' => 'Estimasi hari wajib diisi.',
            'estimated_days.integer' => 'Estimasi hari harus berupa bilangan bulat.',
            'estimated_days.min' => 'Estimasi hari minimal 1 hari.',
            'description.max' => 'Deskripsi maksimal 500 karakter.',
            'is_active.required' => 'Status aktif wajib diisi.',
            'is_active.boolean' => 'Status aktif harus true atau false.',
        ];
    }
}
