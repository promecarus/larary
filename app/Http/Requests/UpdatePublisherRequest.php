<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePublisherRequest extends FormRequest
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
                Rule::unique('publishers')->ignore($this->publisher->id)],
            'slug' => [
                Rule::unique('publishers')->ignore($this->publisher->id)],
        ];
    }
}