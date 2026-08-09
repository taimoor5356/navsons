<?php

namespace App\Http\Requests;

use App\Rules\EmailRule;
use App\Support\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class CheckEmailPhoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Normalize the phone number before validation so "03001234567",
     * "3001234567" and "+923001234567" are all treated as the same number.
     */
    protected function prepareForValidation(): void
    {
        if ($this->filled('phone')) {
            $this->merge(['phone' => PhoneNumber::normalize($this->phone)]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', new EmailRule, 'unique:users,email'],
            'phone' => ['required', 'unique:users,phone'],
        ];
    }
}
