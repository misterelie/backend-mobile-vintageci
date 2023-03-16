<?php

namespace App\Mail;

use App\Models\Annonce;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserVipAnnoncNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $annonce;
    public $user;
    public $date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Annonce $annonce)
    {
        $this->annonce = $annonce;
    }

    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.new-vip-annonce')
        ->subject("Annonce VIP");
    }
}
