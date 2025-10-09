<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
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
            'quote' => 'required|string|min:10|max:1000',
            'author' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'quote.required' => 'La citation est obligatoire',
            'quote.min' => 'La citation doit contenir au moins 10 caractères',
            'quote.max' => 'La citation ne peut pas dépasser 1000 caractères',
            'author.required' => 'L\'auteur est obligatoire',
            'author.max' => 'Le nom de l\'auteur ne peut pas dépasser 255 caractères',
            'category.max' => 'La catégorie ne peut pas dépasser 100 caractères',
        ];
    }
}
