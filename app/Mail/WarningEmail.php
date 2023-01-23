<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;

class WarningEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'admin@test.com', 'name' => 'NIZIMARI事務所'])
                    ->subject('警告メッセージ')
                    ->view('emails.warning')
                    ->with([
                        'text' => $this->text
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'admin@test.com', 'name' => 'NIZIMARI事務所'])
                    ->subject('警告メッセージ')
                    ->view('emails.warning')
                    ->with([
                      'text' => $this->text
                    ]);
    }
}