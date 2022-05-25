<?php

namespace App\Console\Commands\Package;

use App\Jobs\Notification\Package\SendExpireNotificationJob;
use App\Mail\Notifications\PackageExpiredMail;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use Illuminate\Console\Command;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ExpirePackageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'packages:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the database table user package expire status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $user_package_expired=UserPackageInfoMaster::whereDate('expires_on',Carbon::now())
        ->with('user')
        ->get();

         $user_package_expired->each(function ($userInfo)
          {
              dispatch(new SendExpireNotificationJob($userInfo));
          });

        return  UserPackageInfoMaster::whereDate('expires_on',Carbon::now())->update(["is_expired"=>1]);

    }
}
