<?php

namespace App\Mail;

use App\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class RentRegistration extends Mailable
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
        $subject = 'PropertyZone Registration Notification';
        return $this->view('emails.rent_registration')
            ->from($address, $name)
            ->subject($subject);
    }
}
