<?php

namespace App\Http\Controllers;

use App\Helpers\Utility;
use App\Mail\MailSend;
use App\Rules\ContactRule;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {

        $request->validate([
            'name' => 'required|min:5|max:60',
            'email' => 'required|email',
            'message' => ['required', ContactRule::class],
        ]);
        try {
            Utility::sendEmail("dbeefmax@gmail.com", new MailSend($request->name, $request->email, $request->message));
            return redirect()->route('contactanos')->with('message', '¡Formulario enviado con éxito!');
        } catch (Exception $e) {
            return redirect()->route('contactanos')->withErrors(['mail' => 'No se pudo enviar el mensaje. Error: ' . $e->getMessage()]);
        }
    }
}
