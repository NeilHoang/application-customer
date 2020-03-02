<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerManager extends FormRequest
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
            "name" => "required|min:3|max:50",
            "age" => "required|numeric",
            "phone" => "required|numeric"
        ];
    }
    
    public function messages()
    {
        return [
            "name.required" => "Xin Lỗi. Trường NAME không được để trống !",
            "name.min" => "Kí tự của bạn nhỏ hơn 3 vui lòng nhập nhiều hơn 3",
            "name.max" => "Kí tự của bạn lớn hơn 50 vui lòng nhập nhỏ hơn 50",
            "age.required" => "Đã xãy ra lỗi vui lòng thử lại",
            "age.numeric" => "Trường AGE phải là Kiểu Số",
            "phone.required" => "Đã xãy ra lỗi vui lòng thử lại",
            "phone.numeric" => "Trường PHONE phải là Kiểu Số",
        ];
    }
}
