<?php

namespace App\Helpers\Model\ProductSetting;

use App\Models\ProductSetting\ProductSetting;
use App\Traits\Model\ProductSetting\SettingHelperTrait;
use Illuminate\Support\Facades\Cache;


class PrivacySettingHelper
{

    use SettingHelperTrait;

    public $company_privacy_policy;
    public $company_refund_policy;



    protected $fillable=[
        'company_privacy_policy',
        'company_refund_policy'
    ];


    public function __construct()
    {

        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'production')
        {

            $productSettingList = ProductSetting::whereBetween('id',[18,19])->get();

        $this->assignProductSettingValues($productSettingList);

        }


    }


    private  function assignProductSettingValues($productSettingList)
    {

        foreach ($productSettingList as $value) {

            switch($value->setting_name)
            {
                case 'company_privacy_policy': $this->company_privacy_policy=$value->value ; break ;
                case 'company_refund_policy': $this->company_refund_policy=$value->value ; break ;

            }

        }

    }



}
