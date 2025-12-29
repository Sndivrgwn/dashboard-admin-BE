<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CreateVariantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:product,id',
            'option1_name' => 'required|string',
            'option1_value' => 'required|string',
            'option2_name' => 'required|string',
            'option2_value' => 'required|string',
            'price' => 'required|numeric|min:0',
            'compare_at_price' => 'required|numeric|min:0',
            'is_active' => 'required|boolean',
        ];
    }
}
