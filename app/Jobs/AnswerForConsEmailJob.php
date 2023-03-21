<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Invite;
use App\Mail\AnswerForConsEmail;
use App\Models\Consultant;
use Illuminate\Support\Facades\Mail;

class AnswerForConsEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $answer;
    private $consultant;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $user,
        $answer,
        $consultant
    )
    {
        $this->user = $user;
        $this->answer = $answer;
        $this->consultant = $consultant;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->consultant->email)->queue(new AnswerForConsEmail($this->user, $this->answer, $this->consultant));
    }
}