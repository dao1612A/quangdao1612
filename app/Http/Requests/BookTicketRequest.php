<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookTicketRequest extends FormRequest
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
            'tickets' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tickets.required' => 'Mời bạn chọn vé',
        ];
    }
}
