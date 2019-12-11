<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Email;
use App\File;

class FormNewSubmit extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $send = $this->view('emails.formNewSubmit');



        if ( !empty($this->email->files_id) ) {
            $files = explode(',', $this->email->files_id);

            foreach ($files as $file) { 
                $toto = File::where('id', $file)->first();
                $send->attach("storage/".$toto['location'].'/'.$toto['name']);
            }

            $this->email->files_id = $files;
        }

        return $send;
    }
}
