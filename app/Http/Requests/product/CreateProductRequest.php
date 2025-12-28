<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            "category_id" => "required|exists:category,id",
            "brand_id" => "required|exists:brand,id",
            "image" => "required|image|max:2048",
            "name" => "required|string",
            "color" => "required|string",
            "weight_kg" => "nullable|numeric|min:0",
            "length_cm" => "nullable|numeric|min:0",
            "width_cm" => "nullable|numeric|min:0",
            "description" => "nullable|string",
            "price" => "required|numeric|min:0",
            "stock_quantity" => "required|integer|min:0",
            "availability_status" => "required|in:in_stock,out_of_stock,preorder",
            "visibility" => "required|in:public,private,unlisted",
            "channel" => "required|in:online,offline",
            "status" => "required|in:draft,published,scheduled",
            "scheduled_at" => "nullable|date|required_if:status,scheduled",
            "SKU" => "required|string|unique:product,SKU",
        ];
    }
}
