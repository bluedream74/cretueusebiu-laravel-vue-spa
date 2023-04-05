<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification\Notification;
// Carbonをインポート
use Carbon\Carbon;

class MatchingDailyEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $filtered;
    private $newJobs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $filtered, $newJobs)
    {
        $this->user = $user;
        $this->filtered = $filtered;
        $this->newJobs = $newJobs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' => 'info@hojyokin-katsuyou.com', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】'.Carbon::now()->toDateString().'新着事業者相談のお知らせ')
                    ->view('emails.matching_daily')
                    ->with([
                        'user' => $this->user,
                        'filtered' => $this->filtered,
                        'newJobs' => $this->newJobs
                    ]);
    }

    public function render()
    {
        return $this->from(['address' => 'info@hojyokin-katsuyou.com', 'name' => 'HOZYOKIN'])
                    ->subject('【補助金活用.COM】'.Carbon::now()->toDateString().'新着事業者相談のお知らせ')
                    ->view('emails.matching_daily')
                    ->with([
                        'user' => $this->user,
                        'filtered' => $this->filtered,
                        'newJobs' => $this->newJobs
                    ]);
    }
}