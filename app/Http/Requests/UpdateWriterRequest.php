<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWriterRequest extends FormRequest
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
                Rule::unique('writers')->ignore($this->writer->id)],
            'slug' => [
                Rule::unique('writers')->ignore($this->writer->id)],
        ];
    }
}