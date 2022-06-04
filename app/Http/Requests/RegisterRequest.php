<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    public function rules()
    {
        return [
            'phone' => 'required|unique:users,phone,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ];
    }
}
