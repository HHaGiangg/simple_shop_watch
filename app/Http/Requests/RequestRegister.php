<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email'     => 'required|max:190|min:3|unique:users,email,'.$this->id,
            'name'      => 'required',
            'phone'     => 'required|unique:users,phone,'.$this->id,
            'password'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'          => 'Dữ liệu không không được để trống',
            'email.unique'            => 'Dữ liệu đã tồn tại',
            'phone.unique'            => 'Dữ liệu đã tồn tại',
            'name.required'           => 'Dữ liệu không không được để trống',
            'password.required'       => 'Dữ liệu không không được để trống',
            'phone.required'          => 'Dữ liệu không không được để trống'
        ];
    }
}
