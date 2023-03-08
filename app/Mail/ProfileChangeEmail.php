<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;

class ProfileChangeEmail extends Mailable
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
        return $this->from(['address' => 'info@hojyokin-katsuyou.com', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】マイプロフィール変更が完了しました')
                    ->view('emails.profile_changed')
                    ->with([
                        'user' => $this->user
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'info@hojyokin-katsuyou.com', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】マイプロフィール変更が完了しました')
                    ->view('emails.profile_changed')
                    ->with([
                        'user' => $this->user
                    ]);
    }
}