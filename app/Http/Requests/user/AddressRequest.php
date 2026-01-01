<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'label' => [
                'required',
                'string',
                'max:50',
            ],
            'recipient_name' => [
                'required',
                'string',
                'max:100',
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/',
            ],
            'address_line' => [
                'required',
                'string',
                'max:255',
            ],
            'city' => [
                'required',
                'string',
                'max:100',
            ],
            'province' => [
                'required',
                'string',
                'max:100',
            ],
            'postal_code' => [
                'required',
                'digits:5',
            ],
            'is_default' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}
