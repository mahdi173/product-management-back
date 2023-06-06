<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "name"=> "required|string|min:5",
            "description"=> "sometimes|string",
            "price"=> 'required|numeric|between:0,99999.99'
        ];
    }

     /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => "The name is required!",
            'price.required'=> "The price is required",
            'price.numeric'=> "The price is invalid",
            'price.between'=> "The price should be between 0 and 99999.99",
            'name.min' => 'The name must be at least 5 characters long!'
        ];
    }
}
