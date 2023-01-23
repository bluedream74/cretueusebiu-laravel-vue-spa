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
        return $this->from(['address' => 'noreply@hozyokin.jp', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】支援機関新規登録の仮登録が完了しました')
                    ->view('emails.verify-email')
                    ->with([
                        'url' => 'https://hojyokin-katsuyou.com/account/activate?'.'email='.str_replace('+', '%2b', $this->user->email).'&token='.$this->user->token,
                        'tanto_name' => $this->user->tanto_name
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'noreply@hozyokin.jp', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】支援機関新規登録の仮登録が完了しました')
                    ->view('emails.verify-email')
                    ->with([
                        'url' => 'https://hojyokin-katsuyou.com/account/activate?'.'email='.str_replace('+', '%2b', $this->user->email).'&token='.$this->user->token,
                        'tanto_name' => $this->user->tanto_name
                    ]);
    }
}