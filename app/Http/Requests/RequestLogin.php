<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

        public function rules()
    {
        return [
            'email'     => 'required',
            'password'  => 'required'
        ];
    }
        public function messages()
    {
        return [
            'email.required'          => 'Dữ liệu không không được để trống',
            'email.unique'            => 'Dữ liệu đã tồn tại',
            'password.required'       => 'Dữ liệu không không được để trống'
        ];
    }
}
