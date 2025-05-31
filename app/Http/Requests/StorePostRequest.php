<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'thumbnail' => 'nullable|image',
        'plataforma' => 'nullable|string|max:255',
        'puntaje' => 'nullable|integer|min:0|max:10',
        'categories' => 'required|array',
        'categories.*' => 'exists:categories,id',
        'is_published' => 'nullable|boolean',
    ];
}

}
