<?php

namespace Database\Seeders;

use App\Models\SubMaster\FamilyStatusSubMaster\FamilyStatusSubMaster;
use Illuminate\Database\Seeder;

class FamilyStatusSubMasterSeeder extends Seeder
{

    public $family_status_list = [
        'Poor','Lower Middle Class','Upper Middle Class','Rich'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->family_status_list); $i < $length; $i++) {
            $family_status = new FamilyStatusSubMaster();
            $family_status->family_type_name= $this->family_status_list[$i];
            $family_status->save();
        }
    }
}
