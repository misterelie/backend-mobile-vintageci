<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Annonce;
use App\Models\User;

class UserAnnonceValidatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $annonce;
    public $user;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Annonce $annonce, $url)
    {
        $this->annonce = $annonce;
        $this->url = $url;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.annonce-validated')
        ->subject("Annonce validée");
    }
}
