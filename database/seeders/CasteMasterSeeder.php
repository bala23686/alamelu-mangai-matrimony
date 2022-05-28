<?php

namespace Database\Seeders;

use App\Models\Master\CasteMaster\CasteMaster;
use Illuminate\Database\Seeder;

class CasteMasterSeeder extends Seeder
{


    public $caste_master_list = [
        ["caste_name"=>"சைவபிள்ளை","caste_religion"=>1],
        ["caste_name"=>"பிள்ளைமார்","caste_religion"=>1],
        ["caste_name"=>"கார்காத்தார்","caste_religion"=>1],
        ["caste_name"=>"பிராமணர்கள்","caste_religion"=>1],
        ["caste_name"=>"ஐயர்","caste_religion"=>1],
        ["caste_name"=>"ஐயங்கார்","caste_religion"=>1],
        ["caste_name"=>"சைவ செட்டியார்","caste_religion"=>1],

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
