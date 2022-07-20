<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'picture' => ['required', 'image', 'max:4096'],
            'role' => ['required', 'string'],
            'place_of_birth' => ['required', 'string'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'marriage_status' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string'],
            'identity_card_picture' => ['nullable', 'image', 'max:4096'],
            'family_identity_card_picture' => ['nullable', 'image', 'max:4096'],
            'tax_identity_picture' => ['nullable', 'image', 'max:4096'],
            'salary_slip_picture' => ['nullable', 'image', 'max:4096'],
        ];
    }
}
