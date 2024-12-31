<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'kelas' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.numeric' => 'NISN harus berupa angka',
            'kelas.required' => 'Kelas tidak boleh kosong',
        ];
    }
}
