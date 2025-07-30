<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Deteksi role user yang login
        $role = $this->user()->role ?? null;

        // Field rekening, wajib jika petani
        $rekeningRules = [
            'nama_bank'             => ['nullable', 'string', 'max:100'],
            'no_rekening'           => ['nullable', 'string', 'max:50'],
            'nama_pemilik_rekening' => ['nullable', 'string', 'max:100'],
        ];

        if ($role === 'petani') {
            // Wajib jika petani
            $rekeningRules = [
                'nama_bank'             => ['required', 'string', 'max:100'],
                'no_rekening'           => ['required', 'string', 'max:50'],
                'nama_pemilik_rekening' => ['required', 'string', 'max:100'],
            ];
        }

        return array_merge([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'alamat'   => ['required', 'string', 'max:255'],
            'no_hp'    => ['required', 'string', 'max:30'],
            'kode_pos' => ['nullable', 'string', 'max:10'],
            'kota'     => ['required', 'string', 'max:100'],
            'provinsi' => ['required', 'string', 'max:100'],
        ], $rekeningRules);
    }
}
