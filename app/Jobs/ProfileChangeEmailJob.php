<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Invite;
use App\Mail\ProfileChangeEmail;
use App\Models\Consultant;
use App\User;
use Illuminate\Support\Facades\Mail;

class ProfileChangeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
      $email,
      User $user
    )
    {
      $this->email = $email;
      $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->queue(new ProfileChangeEmail($this->user));
    }
}