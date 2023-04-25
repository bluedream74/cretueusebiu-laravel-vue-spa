<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Invite;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class ContactEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $content;
    private $email;
    private $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $content,
        $email,
        $name
    )
    {
        $this->content = $content;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to(['y-matsui@digital-dive.biz', 'info@hojyokin-katsuyou.com'])->queue(new ContactEmail($this->content, $this->email, $this->name));
    }
}