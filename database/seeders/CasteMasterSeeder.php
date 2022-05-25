<?php

namespace Database\Seeders;

use App\Models\Master\CasteMaster\CasteMaster;
use Illuminate\Database\Seeder;

class CasteMasterSeeder extends Seeder
{


    public $caste_master_list = [
        ["caste_name"=>"CASTE-HINDU-1","caste_religion"=>1],
        ["caste_name"=>"CASTE-HINDU-2","caste_religion"=>1],
        ["caste_name"=>"CASTE-HINDU-3","caste_religion"=>1],
        ["caste_name"=>"CASTE-HINDU-4","caste_religion"=>1],
        ["caste_name"=>"NO CASTE BAR","caste_religion"=>1],
        ["caste_name"=>"CASTE-CHRISTIAN-1","caste_religion"=>2],
        ["caste_name"=>"CASTE-CHRISTIAN-2","caste_religion"=>2],
        ["caste_name"=>"CASTE-CHRISTIAN-3","caste_religion"=>2],
        ["caste_name"=>"CASTE-CHRISTIAN-4","caste_religion"=>2],
        ["caste_name"=>"NO CASTE BAR","caste_religion"=>2],
        ["caste_name"=>"CASTE-MUSLIM-1","caste_religion"=>3],
        ["caste_name"=>"CASTE-MUSLIM-2","caste_religion"=>3],
        ["caste_name"=>"CASTE-MUSLIM-3","caste_religion"=>3],
        ["caste_name"=>"CASTE-MUSLIM-4","caste_religion"=>3],
        ["caste_name"=>"NO CASTE BAR","caste_religion"=>3],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->caste_master_list); $i < $length; $i++) {

            $caste = new CasteMaster();
            $caste->caste_name = $this->caste_master_list[$i]['caste_name'];
            $caste->caste_religion = $this->caste_master_list[$i]['caste_religion'];
            $caste->save();
        }
    }
}
