<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCollectionRequest extends FormRequest
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
                Rule::unique('collections')->ignore($this->collection->id),
            ],
            'slug' => [
                Rule::unique('collections')->ignore($this->collection->id),
            ],
        ];
    }
}