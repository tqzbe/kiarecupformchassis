<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormConfirmation;
use App\Mail\FormNewSubmit;
use App\File;

class FormController extends Controller
{
    public function send(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email'
        ];

        $validatedData = $request->validate($rules);

        $emailCreated = Email::create($validatedData);

        if ( !$emailCreated ) {
            return redirect()->route('home')->withError("Une erreur est survenue lors de l'envoi de votre message. Veuillez ré-essayer !");
        }

        $files = [];
        if ( !empty($request->files_name) ) {
            $emailCreated->files_id = $request->files_name;
            $emailCreated->save();
            $files = explode(',', $request->files_name);
        }

        if ( !empty($files) ) {
            foreach ( $files as $key => $file ) {
                $file = File::where('id', $file)->update(['linkable_id' => $emailCreated->id]);
            }
        }

        Mail::to($request->email)->send(new FormConfirmation());
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new FormNewSubmit($emailCreated));

        return redirect()->route('home')->withSuccess('Votre message a bien été envoyé !');
    }
}
