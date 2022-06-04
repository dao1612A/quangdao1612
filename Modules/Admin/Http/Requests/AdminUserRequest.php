<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'  => 'required',
            'phone' => 'required|unique:users,phone,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Dữ liệu không được để trống',
            'phone.required' => 'Dữ liệu không được để trống',
            'phone.unique'   => 'Số điện thoại đã tồn tại',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
