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
        return $this->from(['address' => 'noreply@hozyokin.jp', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】パスワード再設定URLを発行しました')
                    ->view('emails.password-reset')
                    ->with([
                        'url' => 'https://hojyokin-katsuyou.com/password_reset_form?'.'email='.str_replace('+', '%2b', $this->user->email).'&token='.$this->user->token,
                        'user_name' => $this->user->com_name
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'noreply@hozyokin.jp', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】パスワード再設定URLを発行しました')
                    ->view('emails.password-reset')
                    ->with([
                        'url' => 'https://hojyokin-katsuyou.com/password_reset_form?'.'email='.str_replace('+', '%2b', $this->user->email).'&token='.$this->user->token,
                        'user_name' => $this->user->com_name
                    ]);
    }
}