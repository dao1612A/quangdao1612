<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminTeacherRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            't_name' => 'required',
            't_job' => 'required',
            't_phone' => 'required',
            't_email' => 'required',
            't_slug' => 'required|unique:teachers,t_slug,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            't_name.required' => 'Dữ liệu không được để trống',
            't_slug.required' => 'Dữ liệu không được để trống',
            't_job.required' => 'Dữ liệu không được để trống',
            't_phone.required' => 'Dữ liệu không được để trống',
            't_email.required' => 'Dữ liệu không được để trống',
            't_slug.unique'   => 'Slug đã tồn tại',
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
