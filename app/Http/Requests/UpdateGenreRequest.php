<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGenreRequest extends FormRequest
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
                Rule::unique('genres')->ignore($this->genre->id)],
            'slug' => [
                Rule::unique('genres')->ignore($this->genre->id)],
        ];
    }
}