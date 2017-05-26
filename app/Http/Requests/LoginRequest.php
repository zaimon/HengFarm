<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'username' => 'required|min:5|regex:/(^[A-Za-z0-9 ]+$)+/',
            'username' => 'required',
            'password' => 'required'
        
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'กรุณากรอก ชื่อผู้ใช้',
            'password.required'  => 'กรุณากรอก รหัสผ่าน'
        ];
    }
}
