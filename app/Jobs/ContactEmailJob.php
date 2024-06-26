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
    private $huri_name;
    private $telephone;
    private $fax;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $content,
        $email,
        $name,
        $huri_name,
        $telephone,
        $fax
    )
    {
        $this->content = $content;
        $this->email = $email;
        $this->name = $name;
        $this->huri_name = $huri_name;
        $this->telephone = $telephone;
        $this->fax = $fax;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to(['info@hojyokin-katsuyou.com', 'y-matsui@digital-dive.biz'])->queue(new ContactEmail($this->content, $this->email, $this->name, $this->huri_name, $this->telephone, $this->fax));
    }
}