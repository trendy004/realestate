<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LegalAction extends Mailable
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
        $address = \Auth::user()->email;
        $name = Tenant::select('firstname');
        $subject = 'PropertyZone Legal Action Notification';
        return $this->view('emails.legal_action')
            ->from($address, $name)
            ->subject($subject);
    }
}
