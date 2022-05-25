<?php

namespace Database\Seeders;

use App\Models\Master\StatusMaster\StatusMaster;
use Illuminate\Database\Seeder;

class StatusMasterSeeder extends Seeder
{


    public $status_master_list = [
        'Active','In-Active','Married','Spam'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->status_master_list); $i < $length; $i++) {
            $status = new StatusMaster();
            $status->status_name= $this->status_master_list[$i];
            $status->save();
        }
    }
}
