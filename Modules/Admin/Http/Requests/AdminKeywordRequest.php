<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminKeywordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'k_name' => 'required',
            'k_slug' => 'required|unique:keywords,k_slug,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'k_name.required' => 'Dữ liệu không được để trống',
            'k_slug.required' => 'Dữ liệu không được để trống',
            'k_slug.unique'   => 'Slug da ton tai',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
