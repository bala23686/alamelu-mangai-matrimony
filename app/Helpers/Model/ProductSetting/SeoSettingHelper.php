<?php

namespace App\Helpers\Model\ProductSetting;

use App\Models\ProductSetting\ProductSetting;
use App\Traits\Model\ProductSetting\SettingHelperTrait;


class SeoSettingHelper
{

    use SettingHelperTrait;

    public $seo_tittle;
    public $seo_meta_tittle;
    public $seo_meta_description;
    public $seo_meta_keywords;



    protected $fillable = [
        'seo_tittle',
        'seo_meta_tittle',
        'seo_meta_description',
        'seo_meta_keywords',
    ];


    public function __construct()
    {
        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'production') {
            $productSettingList = ProductSetting::whereBetween('id', [27, 30])->get();

            $this->assignProductSettingValues($productSettingList);
        }
    }


    private  function assignProductSettingValues($productSettingList)
    {

        foreach ($productSettingList as $value) {

            switch ($value->setting_name) {
                case 'seo_tittle':
                    $this->seo_tittle = $value->value;
                    break;
                case 'seo_meta_tittle':
                    $this->seo_meta_tittle = $value->value;
                    break;
                case 'seo_meta_description':
                    $this->seo_meta_description = $value->value;
                    break;
                case 'seo_meta_keywords':
                    $this->seo_meta_keywords = $value->value;
                    break;
            }
        }
    }
}
