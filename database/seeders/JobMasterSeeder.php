<?php

namespace Database\Seeders;

use App\Models\Master\JobMaster\JobMaster;
use Illuminate\Database\Seeder;

class JobMasterSeeder extends Seeder
{

    public $job_master_list = [
        'IT-professional',
        'Mechanical',
        'Engineering',
        'Doctor',
        'Scientist',
        'Pilot',
        'Army',
        'Navy',
        'others',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->job_master_list); $i < $length; $i++) {
            $jobs = new JobMaster();
            $jobs->job_name= $this->job_master_list[$i];
            $jobs->save();
        }
    }
}
