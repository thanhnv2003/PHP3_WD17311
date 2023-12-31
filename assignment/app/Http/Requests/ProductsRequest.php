<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
        $rules = [];

        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case "POST":
                switch ($currentAction):
                    case 'add':
                        $rules = [
                            "name" => 'required',
                            'amount' => 'required|numeric',
                            'old_price' => 'required|numeric',
                            'sale_price' => 'required|numeric',

                        ];
                        break;
                    case 'edit':
                        $rules = [
                            "name" => 'required',
                            'amount' => 'required|numeric',
                            'old_price' => 'required|numeric',
                            'sale_price' => 'required|numeric',

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
            'name.required' => 'Tên bắt buộc phải là nhập',
            'amount.required' => 'Số lượng bắt buộc phải là nhập',
            'old_price.required' => 'Giá cũ bắt buộc phải là nhập',
            'sale_price.required' => 'Giá sale bắt buộc phải là nhập',
            'description.required' => 'Mô tả bắt buộc phải là nhập',
        ];
    }
}
