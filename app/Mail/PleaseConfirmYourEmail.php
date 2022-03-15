<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class PleaseConfirmYourEmail extends Mailable
{
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.please-confirm-your-email');
    }
}
