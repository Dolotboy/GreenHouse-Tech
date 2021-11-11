<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Profile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $profile;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail/account-created')
                    ->with([
                        'firstName' => $this->profile->firstName,
                        'email' => $this->profile->email,
                    ])
                    ->markdown('mail.account-created', ['url' => '',
                ]);
    }
}
