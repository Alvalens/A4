<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPass extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $nama;

    /**
     * Create a new message instance.
     *
     * @param string $token
     * @param string $nama
     */
    public function __construct($token, $nama)
    {
        $this->token = $token;
        $this->nama = $nama;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset Password')
            ->view('layout.emails.reset-pass')
            ->with([
                'token' => $this->token,
                'nama' => $this->nama,
            ]);
    }
}

