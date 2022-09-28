<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'noreply@nizimari.jp', 'name' => 'nizimari'])
                    ->subject('パスワードリセット')
                    ->view('emails.password-reset')
                    ->with([
                        'url' => 'https://nizimari.jp/password_reset_form?'.'email='.str_replace('+', '%2b', $this->user->email).'&token='.$this->user->token,
                        'user_name' => 'お客'
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'noreply@nizimari.jp', 'name' => 'nizimari'])
                    ->subject('パスワードリセット')
                    ->view('emails.password-reset')
                    ->with([
                        'url' => 'https://nizimari.jp/password_reset_form?'.'email='.str_replace('+', '%2b', $this->user->email).'&token='.$this->user->token,
                        'user_name' => 'お客'
                    ]);
    }
}