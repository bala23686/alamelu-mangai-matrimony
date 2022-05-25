<?php

namespace Database\Seeders;

use App\Models\SubMaster\MartialStatusSubMaster\MartialStatusSubMaster;
use Illuminate\Database\Seeder;

class MartialStatusSubMasterSeeder extends Seeder
{

    public $martial_status_list = [
        'Married',
        'Un-Married',
        'Widow',
        'Waiting for devorice',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->martial_status_list); $i < $length; $i++) {
            $martial_status = new MartialStatusSubMaster();
            $martial_status->martial_status_name= $this->martial_status_list[$i];
            $martial_status->save();
        }
    }
}
