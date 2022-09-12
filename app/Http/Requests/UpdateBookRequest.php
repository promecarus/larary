<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('books')->ignore($this->book->id),
            ],
            'slug' => [
                Rule::unique('books')->ignore($this->book->id),
            ],
            'cover' => [
                'image',
                'file',
                'max:2048',
            ],
            'publication_date' => 'required',
            'total_pages' => 'required',
            'isbn' => 'required',
        ];
    }
}