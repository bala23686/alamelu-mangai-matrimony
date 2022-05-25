<?php

namespace App\Helpers\Model\ProductSetting;

use App\Models\ProductSetting\ProductSetting;
use App\Traits\Model\ProductSetting\SettingHelperTrait;
use Illuminate\Support\Facades\Cache;


class CompanySettingHelper
{

    use SettingHelperTrait;


    public const LOGO_IMAGE_PATH = '/logo/';
    public const WATER_MARK_IMAGE_PATH = '/watermark/';

    public $company_name;
    public $company_slogan;
    public $company_country;
    public $company_address;
    public $company_state;
    public $company_city;
    public $company_pincode;
    public $company_contact_number;
    public $company_whatsapp_number;
    public $company_email;
    public $company_about;
    public $company_fb_link;
    public $company_youtube_link;
    public $company_logo;
    public $company_water_mark;
    public $company_logo_image;


    private $fillable = [

        "company_name",
        "company_slogan",
        "company_country",
        "company_address",
        "company_state",
        "company_city",
        "company_pincode",
        "company_contact_number",
        "company_whatsapp_number",
        "company_email",
        "company_about",
        "company_fb_link",
        "company_youtube_link",
        "company_logo",
        "company_water_mark",
        "company_logo_image",

    ];

    public function __construct()
    {

        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'production') {
            $comapany_setting = Cache::rememberForever('companySetting', function () {
                return  ProductSetting::whereBetween('id', [2, 17])->get();
            });

            $this->assignCompanyValues($comapany_setting);
        }
    }


    public static function loadLogo()
    {

        $logo = Cache::rememberForever('companyLogo', function () {
            return ProductSetting::where('setting_name', 'company_logo')->first()->value;
        });

        return $logo;
    }

    public static function loadLogoFile()
    {

        $logo = Cache::rememberForever('companyFile', function () {
            return ProductSetting::where('setting_name', 'company_logo_image')->first()->value;
        });

        return $logo;
    }

    public static function loadWaterMark()
    {

        $waterMark = Cache::rememberForever('companyWaterMark', function () {
            return ProductSetting::where('setting_name', 'company_water_mark')->first()->value;
        });

        return $waterMark;
    }

    private function assignCompanyValues($productSettingList)
    {

        foreach ($productSettingList as $value) {

            switch ($value->setting_name) {
                case 'company_name':
                    $this->company_name = $value->value;
                    break;
                case 'company_slogan':
                    $this->company_slogan = $value->value;
                    break;
                case 'company_address':
                    $this->company_address = $value->value;
                    break;
                case 'company_state':
                    $this->company_state = $value->value;
                    break;
                case 'company_city':
                    $this->company_city = $value->value;
                    break;
                case 'company_pincode':
                    $this->company_pincode = $value->value;
                    break;
                case 'company_country':
                    $this->company_country = $value->value;
                    break;
                case 'company_contact_number':
                    $this->company_contact_number = $value->value;
                    break;
                case 'company_whatsapp_number':
                    $this->company_whatsapp_number = $value->value;
                    break;
                case 'company_email':
                    $this->company_email = $value->value;
                    break;
                case 'company_about':
                    $this->company_about = $value->value;
                    break;
                case 'company_fb_link':
                    $this->company_fb_link = $value->value;
                    break;
                case 'company_youtube_link':
                    $this->company_youtube_link = $value->value;
                    break;
                case 'company_logo':
                    $this->company_logo = $value->value;
                    break;
                case 'company_water_mark':
                    $this->company_water_mark = $value->value;
                    break;
                case 'company_logo_image':
                    $this->company_logo_image = $value->value;
                    break;
            }
        }
    }
}
