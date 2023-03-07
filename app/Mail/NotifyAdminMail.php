<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $listByUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($listByUser)
    {
        $this->listByUser = $listByUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from("noreply@system.com","SYSTEM");
        $this->subject('Se ha registrado un nuevo usuario');
        return $this->view('emails.mailAdminUser');
    }
}
