<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
//        dd(12345);
        //thươờng xủ lý validate trong này
        $rules = [];
        //lấy ra phương thức đang hoạt động
        $currentAction = $this->route()->getActionMethod();
//        dd($currentAction);
        switch ($this->method()) :
            case 'POST':
                switch ($currentAction):
                    case 'add':
                        $rules = [
                            "email" => "required|email|unique:tests" ,
                            "name" => "required"
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            "email" => "required|email" ,
                            "name" => "required"
                        ];
                        break;
                    default:
                        break;
                    endswitch;
            endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'email' => 'Bắt buộc phải là định dạng email',
            'email.required' => 'Bắt buộc phải là nhập',
            'email.unique' => 'Email đã tồn tại trên hệ thống',
            'name.required' => 'Bắt buộc phải là nhập',
        ];
    }
}
