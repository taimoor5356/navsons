<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryBannerRequest extends FormRequest
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
        $required = $this->isMethod('POST') ? 'required' : 'nullable';

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'image' => [$required, 'string', 'max:255'],
            'position' => ['required', 'in:top,bottom'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => __('The category field is required.'),
            'image.required' => __('The image field is required.'),
        ];
    }
}
