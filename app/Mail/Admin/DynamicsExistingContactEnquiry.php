<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DynamicsExistingContactEnquiry extends Mailable
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

        if( isset($data['first_name']) ){
            $first_name = $data['first_name'];
        }elseif ( isset($data['firstname']) ) {
            $first_name = $data['firstname'];
        }else{
            $first_name = 'N/A';
        }

        return $this->subject('Contact Enquiry by '.$first_name.'')
                    // ->markdown('emails.admin.dynamics-contact-enquiry')
                    ->markdown('emails.admin.dynamics-existing-contact-enquiry.blade')
                    ->with('maildata', $this->maildata);
    }
}
