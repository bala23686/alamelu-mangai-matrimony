<?php

namespace Database\Seeders;

use App\Models\Master\EducationMaster\EducationMaster;
use Illuminate\Database\Seeder;

class EducationMasterSeeder extends Seeder
{

    public $education_master_list = [
        'Bsc',
        'Msc',
        'B.com',
        'M.com',
        'B.ED',
        'M.ED',
        'PHD',
        'MBBS',
        'MBA',
        'Ms',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->education_master_list); $i < $length; $i++) {
            $education = new EducationMaster();
            $education->education_name= $this->education_master_list[$i];
            $education->save();
        }
    }
}
