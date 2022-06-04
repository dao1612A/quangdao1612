<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCourseContentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cc_name' => 'required',
            'cc_total_video' => 'required',
            'cc_total_question' => 'required',
            'cc_content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cc_name.required' => 'Dữ liệu không được để trống',
            'cc_total_video.required' => 'Dữ liệu không được để trống',
            'cc_total_question.required' => 'Dữ liệu không được để trống',
            'cc_content.required' => 'Dữ liệu không được để trống'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
