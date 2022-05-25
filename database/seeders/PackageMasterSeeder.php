<?php

namespace Database\Seeders;

use App\Models\Master\PackageMaster\PackageMaster;
use Illuminate\Database\Seeder;

class PackageMasterSeeder extends Seeder
{


    public $package_list = [

        ["package_name"=>"Basic Package","package_allowed_profile"=>1000000,"package_valid_for"=>12,"package_photo_upload"=>20,"package_interest_allowed"=>1000000,"package_price"=>1000],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->package_list); $i < $length; $i++) {

            $packages = new PackageMaster();
            $packages->package_name = $this->package_list[$i]['package_name'];
            $packages->package_allowed_profile = $this->package_list[$i]['package_allowed_profile'];
            $packages->package_valid_for = $this->package_list[$i]['package_valid_for'];
            $packages->package_photo_upload = $this->package_list[$i]['package_photo_upload'];
            $packages->package_interest_allowed = $this->package_list[$i]['package_interest_allowed'];
            $packages->package_price = $this->package_list[$i]['package_price'];
            $packages->save();
        }
    }
}
