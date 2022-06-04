<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSlideRequest extends FormRequest
{
    public function rules()
    {
        return [
            's_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            's_name.required' => 'Dữ liệu không được để trống',
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
