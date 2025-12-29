<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class updateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "category_id" => "nullable|exists:category,id",
            "brand_id" => "nullable|exists:brand,id",
            'images'   => 'nullable|array|min:1|max:5',
            "images.*" => "image|max:2048",
            "name" => "nullable|string",
            "color" => "nullable|string",
            "weight_kg" => "nullable|numeric|min:0",
            "length_cm" => "nullable|numeric|min:0",
            "width_cm" => "nullable|numeric|min:0",
            "description" => "nullable|string",
            "price" => "nullable|numeric|min:0",
            "stock_quantity" => "nullable|integer|min:0",
            "availability_status" => "nullable|in:in_stock,out_of_stock,preorder",
            "visibility" => "nullable|in:public,private,unlisted",
            "channel" => "nullable|in:online,offline",
            "status" => "nullable|in:draft,published,scheduled",
            "scheduled_at" => "nullable|date|required_if:status,scheduled",
        ];
    }
}
