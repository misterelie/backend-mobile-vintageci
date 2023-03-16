<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public $url;
    public $confirmation = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($confirmation)
    {
        //$this->url = $url;
        $this->confirmation = $confirmation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.confirmation-mail')
        ->subject($this->confirmation['subject']);
    }
}
