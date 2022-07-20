<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'subcategory_id' => ['nullable', 'exists:subcategories,id'],
            'name' => ['required', 'string'],
            'picture_1' => ['nullable', 'image', 'max:4096'],
            'picture_2' => ['nullable', 'image', 'max:4096'],
            'picture_3' => ['nullable', 'image', 'max:4096'],
            'picture_4' => ['nullable', 'image', 'max:4096'],
            'picture_5' => ['nullable', 'image', 'max:4096'],
            'condition' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'length' => ['required', 'integer'],
            'width' => ['required', 'integer'],
            'height' => ['required', 'integer'],
            'color' => ['required', 'string'],
        ];
    }
}
