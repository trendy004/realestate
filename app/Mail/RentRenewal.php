<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RentRenewal extends Mailable
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
        $subject = 'PropertyZone Renewal Notification';
        return $this->view('emails.rent_renewal')
            ->from($address, $name)
            ->subject($subject);
    }
}
