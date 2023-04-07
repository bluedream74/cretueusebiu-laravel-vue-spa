<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Invite;
use App\Mail\InvoiceEmail;
use App\Models\Consultant;
use Illuminate\Support\Facades\Mail;

class InvoiceEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $month;
    private $start_date;
    private $end_date;
    private $expire_date;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $user,
        $month,
        $start_date,
        $end_date,
        $expire_date
    )
    {
        $this->user = $user;
        $this->month = $month;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->expire_date = $expire_date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->queue(new InvoiceEmail($this->user, $this->month, $this->start_date, $this->end_date, $this->expire_date));
    }
}