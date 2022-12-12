<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Invite;
use App\Mail\ConsultantEmail;
use App\Models\Consultant;
use Illuminate\Support\Facades\Mail;

class ConsultantEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $consultant;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        Consultant $consultant
    )
    {
        $this->consultant = $consultant;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->consultant->email)->queue(new ConsultantEmail($this->consultant));
    }
}