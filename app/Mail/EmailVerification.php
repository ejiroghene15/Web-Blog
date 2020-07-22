<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $newuser;

    public function __construct($newUser)
    {
        $this->newuser = $newUser['name'];
        $this->link =  config('app.url') . "/verifyaccount?vtk={$newUser['verification_token']}";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), config('app.name'))
            ->markdown('mail.verification')
            ->with([
                "name" => $this->newuser,
                "link" => $this->link
            ]);
    }
}
