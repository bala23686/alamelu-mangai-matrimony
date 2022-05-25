<?php

namespace App\Jobs\Notification\Package;

use App\Mail\Notifications\PackageExpiredMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendExpireNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $userInfo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userInfo)
    {
        $this->userInfo=$userInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->userInfo->user->email)->send(new PackageExpiredMail($this->userInfo->user));
    }
}
