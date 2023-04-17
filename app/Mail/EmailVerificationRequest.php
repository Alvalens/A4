<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class EmailVerificationRequest extends Mailable
{
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public $verificationCode;

    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function build()
    {
        $verificationUrl = URL::signedRoute('email.verify', ['code' => $this->verificationCode, 'email' => $this->to[0]['address']]);
        return $this->view('layout.emails.verif')
        ->subject('Email Verification')
        ->with([
            'verificationUrl' => $verificationUrl,
            // pass the email
            'email' => $this->to[0]['address'],
        ]);
    }

}
