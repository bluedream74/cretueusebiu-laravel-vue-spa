<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Invite;
use App\Mail\WarningEmail;
use Illuminate\Support\Facades\Mail;

class WarningEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user_email;
    private $text;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $user_email,
        $text
    )
    {
        $this->user_email = $user_email;
        $this->text = $text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user_email)->queue(new WarningEmail($this->text));
    }
}