<?php

namespace Database\Seeders;

use App\Models\Master\PackageMaster\PackageMaster;
use Illuminate\Database\Seeder;

class PackageMasterSeeder extends Seeder
{


    public $package_list = [

        ["package_name"=>"Basic Package","package_allowed_profile"=>1,"package_valid_for"=>1,"package_photo_upload"=>1,"package_interest_allowed"=>1,"package_price"=>0],
        ["package_name"=>"Simple Package","package_allowed_profile"=>5,"package_valid_for"=>3,"package_photo_upload"=>5,"package_interest_allowed"=>5,"package_price"=>1000],
        ["package_name"=>"Hero Package","package_allowed_profile"=>25,"package_valid_for"=>6,"package_photo_upload"=>10,"package_interest_allowed"=>10,"package_price"=>2000],
        ["package_name"=>"Elite Package","package_allowed_profile"=>50,"package_valid_for"=>9,"package_photo_upload"=>12,"package_interest_allowed"=>12,"package_price"=>5000],

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
