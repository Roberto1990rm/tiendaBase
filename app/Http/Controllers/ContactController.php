<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'messageContent' => $validatedData['message'], // Cambié 'message' a 'messageContent' para evitar conflictos
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to(env('MAIL_TO_ADDRESS', 'your-email@example.com'))
                    ->subject('Nuevo Mensaje de Contacto')
                    ->replyTo($data['email'], $data['name']);
        });

        return back()->with('success', 'Tu mensaje ha sido enviado exitosamente.');
    }
}

