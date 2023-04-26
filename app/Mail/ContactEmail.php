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
    private $huri_name;
    private $telephone;
    private $fax;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $email, $name, $huri_name, $telephone, $fax)
    {
        $this->content = $content;
        $this->email = $email;
        $this->name = $name;
        $this->huri_name = $huri_name;
        $this->telephone = $telephone;
        $this->fax = $fax;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => $this->email, 'name' => $this->name])
                    ->subject('【お問い合わせ】ホームページより受付')
                    ->view('emails.contact')
                    ->with([
                        'content' => $this->content,
                        'name' => $this->name,
                        'huri_name' => $this->huri_name,
                        'telephone' => $this->telephone,
                        'fax' => $this->fax,
                        'email' => $this->email
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => $this->email, 'name' => $this->name])
                    ->subject('【お問い合わせ】ホームページより受付')
                    ->view('emails.contact')
                    ->with([
                        'content' => $this->content,
                        'name' => $this->name,
                        'huri_name' => $this->huri_name,
                        'telephone' => $this->telephone,
                        'fax' => $this->fax,
                        'email' => $this->email
                    ]);
    }
}