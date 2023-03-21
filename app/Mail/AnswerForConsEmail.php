<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;

class AnswerForConsEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $answer;
    private $consultant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $answer, $consultant)
    {
        $this->user = $user;
        $this->answer = $answer;
        $this->consultant = $consultant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'info@hojyokin-katsuyou.com', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】事業者相談回答が完了しました')
                    ->view('emails.answer_for_cons')
                    ->with([
                        'user' => $this->user,
                        'answer' => $this->answer,
                        'consultant' => $this->consultant
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'info@hojyokin-katsuyou.com', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】事業者相談回答が完了しました')
                    ->view('emails.answer_for_cons')
                    ->with([
                        'user' => $this->user,
                        'answer' => $this->answer,
                        'consultant' => $this->consultant
                    ]);
    }
}