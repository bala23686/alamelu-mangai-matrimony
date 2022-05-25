<?php

namespace App\Helpers\Model\ProductSetting;

use App\Models\ProductSetting\ProductSetting;
use App\Traits\Model\ProductSetting\SettingHelperTrait;
use Illuminate\Support\Facades\Cache;


class PackageSettingHelper
{

    use SettingHelperTrait;

    public $package_carry_forward;


    protected $fillable=[
        'package_carry_forward'
    ];


    public function __construct()
    {


        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'production')
        {
             $productSettingList = ProductSetting::all();



        $this->assignProductSettingValues($productSettingList);
        }


    }


    private  function assignProductSettingValues($productSettingList)
    {

        foreach ($productSettingList as $value) {

            switch($value->setting_name)
            {
                case 'package_carry_forward': $this->package_carry_forward=$value->value ; break ;

            }

        }

    }



}
