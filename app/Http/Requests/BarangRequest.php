<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'item_id' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string'],
            'point' => ['required', 'integer', 'min:0', 'max:100']
        ];

        if ($this->method() == 'POST') {
            $rules['item_id'][] = 'unique:barangs,uid';
        } elseif ($this->method() == 'PUT') {
            if ($this->barang->uid !== $this->item_id) {
                $rules['item_id'][] = 'unique:barangs,uid,' . $this->barang->id . ',id';
            }
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'msc.required' => 'MSC barang tidak boleh kosong',
            'msc.string' => 'MSC barang harus berupa string',
            'msc.max' => 'MSC barang tidak boleh lebih dari 100 karakter',
            'msc.unique' => 'MSC barang sudah digunakan',
            'name.required' => 'Nama barang tidak boleh kosong',
            'name.string' => 'Nama barang harus berupa string',
            'name.max' => 'Nama barang tidak boleh lebih dari 100 karakter',
            'desc.required' => 'Deskripsi barang tidak boleh kosong',
            'desc.string' => 'Deskripsi barang harus berupa string',
            'point.required' => 'Point barang tidak boleh kosong',
            'point.integer' => 'Point barang harus berupa angka'
        ];
    }
}
