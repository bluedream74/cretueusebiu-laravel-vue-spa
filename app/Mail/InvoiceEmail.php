<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;
// Carbonをインポート
use Carbon\Carbon;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $month;
    private $start_date;
    private $end_date;
    private $expire_date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $month, $start_date, $end_date, $expire_date)
    {
        $this->user = $user;
        $this->month = $month;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->expire_date = $expire_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'info@hojyokin-katsuyou.com', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】'.$this->month.'のご請求内容のお知らせ')
                    ->view('emails.invoice')
                    ->with([
                        'user' => $this->user,
                        'month' => $this->month,
                        'start_date' => $this->start_date,
                        'end_date' => $this->end_date,
                        'expire_date' => $this->expire_date
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'info@hojyokin-katsuyou.com', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】'.$this->month.'のご請求内容のお知らせ')
                    ->view('emails.invoice')
                    ->with([
                        'user' => $this->user,
                        'month' => $this->month,
                        'start_date' => $this->start_date,
                        'end_date' => $this->end_date,
                        'expire_date' => $this->expire_date
                    ]);
    }
}