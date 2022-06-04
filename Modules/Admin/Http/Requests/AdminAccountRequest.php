<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|unique:admins,email,' . $this->id,
//            'password' => 'required',
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Dữ liệu không được để trống',
            'email.required' => 'Dữ liệu không được để trống',
            'email.unique' => 'Email đã tồn tại',
//            'password.required' => 'Dữ liệu không được để trống',
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
