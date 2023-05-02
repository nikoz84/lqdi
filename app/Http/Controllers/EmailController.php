<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Http\Requests\EmailRequest;

class EmailController extends Controller
{
    public function save(EmailRequest $request)
    {

        $validated = $request->validated();

        $email = new Email;

        $email->fill($validated);

        if (!$email->save()) {
            return response()->json(['message' => 'Não foi possível salvar'], 422);
        }

        return response()->json([
            'message' => 'Salvo com successo',
        ], 200);
    }


    public function list()
    {
        $emails = Email::paginate(4);

        return response()->json($emails, 200);
    }
}
