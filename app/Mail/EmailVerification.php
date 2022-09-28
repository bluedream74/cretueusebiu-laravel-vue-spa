<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
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
        return $this->from(['address' => 'noreply@nizimari.jp', 'name' => 'NIZIMARI'])
                    ->subject('仮登録完了のお知らせ 本登録を行ってください')
                    ->view('emails.verify-email')
                    ->with([
                        'url' => 'https://nizimari.jp/account/activate?'.'email='.str_replace('+', '%2b', $this->user->email).'&token='.$this->user->token,
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'noreply@nizimari.jp', 'name' => 'NIZIMARI'])
                    ->subject('仮登録完了のお知らせ 本登録を行ってください')
                    ->view('emails.verify-email')
                    ->with([
                        'url' => 'https://nizimari.jp/account/activate?'.'email='.str_replace('+', '%2b', $this->user->email).'&token='.$this->user->token,
                    ]);
    }
}