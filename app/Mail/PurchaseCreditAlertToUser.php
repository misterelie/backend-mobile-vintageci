<?php

namespace App\Mail;

use App\Models\OffreCredit;
use App\Models\PurchaseCredit;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseCreditAlertToUser extends Mailable
{
    use Queueable, SerializesModels;
    public $credit;
    public $user;
    public $provider = [];


    public function __construct(User $user, OffreCredit $credit, $provider)
    {
        $this->credit = $credit;
        $this->user = $user;
        $this->provider = $provider;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.purchase-credit-alert')
        ->subject("Votre Achat de crédit");
    }
}
