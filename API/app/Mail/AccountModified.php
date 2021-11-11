<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Profile;
use Illuminate\Queue\SerializesModels;

class AccountModified extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        return $this->view('mail/account-modified')
                    ->with([
                        'firstName' => $this->profile->firstName,
                        'email' => $this->profile->email,
                    ])
                    ->markdown('mail.account-modified', ['url' => '',
                ]);
    }
}
