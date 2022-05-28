<?php

namespace Database\Seeders;

use App\Models\Master\ReligionMaster\ReligionMaster;
use Illuminate\Database\Seeder;

class ReligionMasterSeeder extends Seeder
{

    public $religion_master_list = [
        'இந்து',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->religion_master_list); $i < $length; $i++) {
            $religion = new ReligionMaster();
            $religion->religion_name= $this->religion_master_list[$i];
            $religion->save();
        }
    }
}
