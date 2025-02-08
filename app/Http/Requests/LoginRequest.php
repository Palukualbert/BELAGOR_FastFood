<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => ['required','regex:/^(\+243|243)?(089|082|084|099|097|098|090|085|081)[0-9]{7,10}$/'],
        ];
    }

    public function messages(): array{
        return [
            'phone.regex' => 'Le numéro de téléphone doit commencer par l\'un des préfixes valides et comporter 10 chiffres.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
        ];
    }
}
