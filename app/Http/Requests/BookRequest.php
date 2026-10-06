<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // akses sudah dibatasi middleware auth pada route
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string', 'max:255'],
            'publisher'   => ['required', 'string', 'max:255'],
            'year'        => ['required', 'integer', 'min:1000', 'max:' . date('Y')],
            'stock'       => ['required', 'integer', 'min:0'],
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'kategori',
            'title'       => 'judul',
            'author'      => 'penulis',
            'publisher'   => 'penerbit',
            'year'        => 'tahun terbit',
            'stock'       => 'stok',
        ];
    }
}
