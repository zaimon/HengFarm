<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Processes;

class ProcessRequest extends Request
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
            'name' => 'required|min:3|unique:Processes',
            'startDate' => 'required',
            'expireDate' => 'required',
            'cost' => 'required',
            'status' => 'required|not_in:0'
    
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอก ชื่อโครงการ',
            'name.unique' => 'ชื่อโครงการ ซ้ำในระบบ',
            'name.min' => 'กรุณากรอก ตั้งชื่อโครงการมากกว่า 3 ตัวอักษร',
            'startDate.required'  => 'กรุณากรอก วันที่เริ่มโครงการ',
            'expireDate.required'  => 'กรุณากรอก วันที่เริ่มสิ้นสุดโครงการ',
            'type.required'  => 'กรุณากรอก ประเภทโครงการ',
            'status.required'  => 'กรุณากรอก สถานะโครงการ'
        ];
    }
}