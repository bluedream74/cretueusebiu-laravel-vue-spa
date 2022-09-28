<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $content;
    private $email;
    private $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $email, $name)
    {
        $this->content = $content;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => $this->email, 'name' => $this->name])
                    ->subject('NIZIMARI　問い合わせ')
                    ->view('emails.contact')
                    ->with([
                        'content' => $this->content,
                        'name' => $this->name
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => $this->email, 'name' => $this->nam])
                    ->subject('NIZIMARI　問い合わせ')
                    ->view('emails.contact')
                    ->with([
                      'content' => $this->content,
                      'name' => $this->name
                    ]);
    }
}