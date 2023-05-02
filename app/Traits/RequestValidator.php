<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait RequestValidator
{
    /**
     * Mensagem padrão de respostas
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'message' => 'Não Foi possível realizar essa ação',
            'errors' => $validator->errors(),
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
