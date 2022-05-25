<?php

namespace Database\Seeders;

use App\Models\SubMaster\ComplexionSubMaster\ComplexionSubMaster;
use Illuminate\Database\Seeder;

class ComplexionSubMasterSeeder extends Seeder
{

    public $complexion_sub_master_list = [
        'chocolate',
        'average',
        'white',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->complexion_sub_master_list); $i < $length; $i++) {
            $complexion = new ComplexionSubMaster();
            $complexion->complexion_name= $this->complexion_sub_master_list[$i];
            $complexion->save();
        }
    }
}
