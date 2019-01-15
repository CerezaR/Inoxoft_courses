<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'page_title' => 'required|string|max:100',
            'status' => 'required',
            'position' => 'required|integer',
            'use' => 'required',
            'url' => 'required|unique:pages|string|max:100',
            'meta_title' => 'required|string|max:100',
            'meta_description' => 'required|string|max:500',
            'meta_keywords' => 'required|string|max:500',
            'body' => 'required',
        ];
    }
}
