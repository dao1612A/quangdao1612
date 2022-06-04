<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailBookSuccess extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $doctor;
    protected $transaction;

    public function __construct($doctor, $user, $transaction)
    {
        $this->user   = $user;
        $this->doctor = $doctor;
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $doctor = $this->doctor;
        $transaction = $this->transaction;
        return $this->from('phupt.humg.94@gmail.com')
            ->view('mail.book_success',compact('user','doctor','transaction'));
    }
}
