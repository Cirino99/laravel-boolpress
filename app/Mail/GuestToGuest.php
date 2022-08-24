<?php

namespace App\Mail;

use App\Models\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GuestToGuest extends Mailable
{
    use Queueable, SerializesModels;

    private $guest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Guest $_guest)
    {
        $this->guest = $_guest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.guestToGuest', [
            'guest' => $this->guest,
        ]);
    }
}
