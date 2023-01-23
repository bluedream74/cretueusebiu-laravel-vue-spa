<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;

class Taikai1Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'admin@nizimari.jp', 'name' => 'NIZIMARI事務所'])
                    ->subject('虹色マリッジ　有料会員退会のお知らせ')
                    ->view('emails.taikai1');
    }

    public function render()
    {
        return $this->from(['address' => 'admin@nizimari.jp', 'name' => 'NIZIMARI事務所'])
                    ->subject('虹色マリッジ　有料会員退会のお知らせ')
                    ->view('emails.taikai1');
    }
}