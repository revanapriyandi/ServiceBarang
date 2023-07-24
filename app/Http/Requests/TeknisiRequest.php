<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeknisiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'idteknisi' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns'],
        ];

        if ($this->method() == 'POST') {
            $rules['idadmin'][] = 'unique:users,uid';
            $rules['email'][] = 'unique:users,email';
        } elseif ($this->method() == 'PUT') {
            $rules['idadmin'][] = 'unique:users,uid,' . $this->teknisi->id;
            $rules['email'][] = 'unique:users,email,' . $this->teknisi->id;
        }

        return $rules;
    }


    /*
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {
        return [
            'idadmin.required' => 'ID Admin harus diisi',
            'idadmin.string' => 'ID Admin harus berupa string',
            'idadmin.max' => 'ID Admin maksimal 20 karakter',
            'idadmin.unique' => 'ID Admin sudah terdaftar',
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Email tidak valid',
        ];
    }
}
