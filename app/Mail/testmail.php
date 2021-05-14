<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class testmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*
            Config::set('mail.driver', config('settings.maildriver'));
            Config::set('mail.host', config('settings.mailhost'));
            Config::set('mail.port', config('settings.mailport'));
            Config::set('mail.encryption', config('settings.mailencryption'));
            Config::set('mail.username', config('settings.mailusername'));
            Config::set('mail.password', config('settings.mailpassword'));
        */
        return $this->view('mails.responsivas');
    }
}
