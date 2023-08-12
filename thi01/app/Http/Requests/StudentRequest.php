<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        $rules = [];

        $currentAction = $this->route()->getActionMethod();
//        dd($currentAction);
        switch ($this->method()):
            case 'POST':
                switch ($currentAction):
                    case 'add':
                        $rules = [
                            'name' => 'required',
                            'gender' => 'required',
                            'phone' => 'required|unique:students,phone',
                            'address' => 'required',
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                        ];
                        break;
                    default:
                        break;
                endswitch;
            break;
        endswitch;
        return $rules;
    }
}
