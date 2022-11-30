<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;

class ConsultantEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $consultant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consultant)
    {
        $this->consultant = $consultant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'noreply@hozyokin.jp', 'name' => 'HOZYOKIN'])
                    ->subject('【事業者相談申し込み】ホームページより受付')
                    ->view('emails.consultant')
                    ->with([
                        'url' => 'https://hojyokin-katsuyou.com/consultant_form/complete?'.'id='.$this->consultant->id,
                        'consultant' => $this->consultant
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'noreply@hozyokin.jp', 'name' => 'HOZYOKIN'])
                    ->subject('【事業者相談申し込み】ホームページより受付')
                    ->view('emails.consultant')
                    ->with([
                        'url' => 'https://hojyokin-katsuyou.com/consultant_form/complete?'.'id='.$this->consultant->id,
                        'consultant' => $this->consultant
                    ]);
    }
}