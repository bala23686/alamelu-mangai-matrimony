<?php

namespace App\Helpers\Model\ProductSetting;

use App\Models\ProductSetting\ProductSetting;
use App\Traits\Model\ProductSetting\SettingHelperTrait;
use Illuminate\Support\Facades\Cache;


class ThemeSettingHelper
{

    use SettingHelperTrait;

    public $primary_color;
    public $primary_color_dark;
    public $primary_color_light;
    public $secondary_color;
    public $secondary_color_dark;
    public $secondary_color_light;
    public $admin_nav_color;


    protected $fillable=[
        'primary_color',
        'primary_color_dark',
        'primary_color_light',
        'secondary_color',
        'secondary_color_dark',
        'secondary_color_light',
        'admin_nav_color',
    ];


    public function __construct()
    {
        $productSettingList = Cache::rememberForever('themeSettings',function()
        {
            return ProductSetting::whereBetween('id',[20,26])->get();
        });

        $this->assignProductSettingValues($productSettingList);

    }

    public static function getThemeColor()
    {

      $themeColor=Cache::rememberForever('themeColor',function (){
        return ProductSetting::where('setting_name','admin_nav_color')->first()->value;
      });

      return $themeColor;
    }

    private  function assignProductSettingValues($productSettingList)
    {

        foreach ($productSettingList as $value) {

            switch($value->setting_name)
            {
                case 'primary_color': $this->primary_color=$value->value ; break ;
                case 'primary_color_dark': $this->primary_color_dark=$value->value ; break ;
                case 'primary_color_light': $this->primary_color_light=$value->value ; break ;
                case 'secondary_color': $this->secondary_color=$value->value ; break ;
                case 'secondary_color_dark': $this->secondary_color_dark=$value->value ; break ;
                case 'secondary_color_light': $this->secondary_color_light=$value->value ; break ;
                case 'admin_nav_color': $this->admin_nav_color=$value->value ; break ;

            }

        }

    }



}
