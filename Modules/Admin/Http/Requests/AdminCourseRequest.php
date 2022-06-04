<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCourseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'c_name' => 'required',
            'c_price' => 'required',
            'c_teacher_id' => 'required',
            'c_category_id' => 'required',
            'c_slug' => 'required|unique:courses,c_slug,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'c_name.required' => 'Dữ liệu không được để trống',
            'c_teacher_id.required' => 'Dữ liệu không được để trống',
            'c_category_id.required' => 'Dữ liệu không được để trống',
            'c_price.required' => 'Dữ liệu không được để trống',
            'c_slug.required' => 'Dữ liệu không được để trống',
            'c_slug.unique'   => 'Slug đã tồn tại',
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
