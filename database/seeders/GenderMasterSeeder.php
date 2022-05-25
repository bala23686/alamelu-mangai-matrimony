<?php

namespace Database\Seeders;

use App\Models\Master\GenderMaster\GenderMaster;
use Illuminate\Database\Seeder;

class GenderMasterSeeder extends Seeder
{

    public $gender_list = [
        'Male','Female'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->gender_list); $i < $length; $i++) {

            $gender = new GenderMaster();
            $gender->gender_name= $this->gender_list[$i];

            $gender->save();
        }
    }
}
