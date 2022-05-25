<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageMasterSeeder extends Seeder
{

    public $profile_status_list = [
        'Active','In-Active','Married','Spam'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->profile_status_list); $i < $length; $i++) {
            $profile_status = new ProfileStatus();
            $profile_status->profile_status_name= $this->profile_status_list[$i];
            $profile_status->save();
        }
    }
}
