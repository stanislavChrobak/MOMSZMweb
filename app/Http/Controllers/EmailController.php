<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $messages = [
            'name.required' => 'Prosím, zadajte svoje meno.',
            'name.min' => 'Meno musí obsahovať aspoň 3 znaky.',
            'email.required' => 'Prosím, zadajte svoj e-mail.',
            'email.email' => 'Prosím, zadajte platnú e-mailovú adresu.',
            'message.required' => 'Prosím, zadajte svoju správu.',
            'message.min' => 'Správa musí obsahovať aspoň 3 znaky.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message'=> 'required|min:3'
        ], $messages);
    
        if ($validator->fails()) {
            return redirect('/contact/#contactForm')
                ->withErrors($validator)
                ->withInput();
        }

        $senderName = $request->input('name');
        $senderEmail = $request->input('email'); 
        $senderMessage = $request->input('message');

        

        try {

            Mail::to('vtt.chrobak@gmail.com')->send(new ContactFormMail(
                $senderName,
                $senderEmail,
                $senderMessage
            ));

        } catch (\Swift_TransportException $e) {
            
            return redirect('/contact/#contactForm')->with('sendingErr', 'Správu sa nepodarilo odoslať.');
        }
        
        return redirect('/contact/#contactForm')->with('success', 'Správa bola úspešne odoslaná.');

    }
}
