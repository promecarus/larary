<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:App\Models\Book,name',
            'cover' => 'image|file|max:2048',
            'publication_date' => 'required',
            'total_pages' => 'required',
            'isbn' => 'required',
        ];
    }
}