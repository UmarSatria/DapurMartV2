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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gambar_produk' => 'required|unique:gambar_produk,except,id',
            'nama_produk' => 'required|unique:barangs,gambar_produk,except,id',
            'stok' => 'required|min:1',


        ];
    }

    public function messages(): array
    {
        return [
            'gambar_produk.required' => 'kolom harus diisi',
            'nama_produk.unique' => 'nama sudah ada',
            'nama_produk.required' => 'kolom harus diisi',
            'stok.required' => 'tidak boleh kurang dari 1',


        ];
    }
}
