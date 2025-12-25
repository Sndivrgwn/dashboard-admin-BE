<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            "first_name" => "nullable|string",
            "last_name" => "nullable|string",
            "email" => "nullable|email",
            "bio" => "nullable|string",
            "phone" => "nullable|string|min:7|max:20",
            "job_title" => "nullable|string",
            "country" => "nullable|string",
            "city_state" => "nullable|string",
            "postal_code" => "nullable|string",
            "tax_id" => "nullable|string",
        ];
    }
}
