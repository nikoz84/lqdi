<?php

namespace App\Http\Requests;

use App\Traits\RequestValidator;
use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    use RequestValidator;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:emails',
        ];
    }
}
