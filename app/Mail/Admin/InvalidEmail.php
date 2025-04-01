<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvalidEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildata)
    {
        $this->maildata = $maildata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $data = $this->maildata;
        $email = $data;

        return $this->subject('Invalid Email Submission Attempt')
                    // ->markdown('emails.admin.dynamics-contact-enquiry')
                    ->markdown('emails.admin.invalid-email')
                    ->with('maildata', $email);
    }
}
