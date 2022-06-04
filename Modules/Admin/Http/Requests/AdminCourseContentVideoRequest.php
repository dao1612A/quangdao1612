<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCourseContentVideoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cv_course_content_id' => 'required',
            'cv_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cv_course_content_id.required' => 'Dữ liệu không được để trống',
            'cv_name.required' => 'Dữ liệu không được để trống'
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
