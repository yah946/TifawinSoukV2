<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:suppliers,email',
            'phone_number' => 'required|string|max:20|unique:suppliers,phone_number',
        ];
    }
}
