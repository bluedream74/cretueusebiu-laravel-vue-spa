<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Invite;
use App\Mail\MatchingDailyEmail;
use App\Models\Consultant;
use Illuminate\Support\Facades\Mail;

class MatchingDailyEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $filtered;
    private $newJobs;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $user,
        $filtered,
        $newJobs
    )
    {
        $this->user = $user;
        $this->filtered = $filtered;
        $this->newJobs = $newJobs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->queue(new MatchingDailyEmail($this->user, $this->filtered, $this->newJobs));
    }
}