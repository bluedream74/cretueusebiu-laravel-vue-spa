<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;

class ContactFinishEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'noreply@hozyokin.jp', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】お問い合わせを受け付けました')
                    ->view('emails.contact_finish')
                    ->with([
                        'contact' => $this->contact,
                    ]);
    }

    public function render()
    {
      return $this->from(['address' => 'noreply@hozyokin.jp', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】お問い合わせを受け付けました')
                    ->view('emails.contact_finish')
                    ->with([
                        'contact' => $this->contact,
                    ]);
    }
}