<?php

namespace Database\Seeders;

use App\Models\ProductSetting\ProductSetting;
use Illuminate\Database\Seeder;

class ProductSettingSeeder extends Seeder
{


    public $settings_list = [
        //product settings seeder section
        ["setting_name"=>"package_carry_forward","value"=>0],
        //end product settings seeder section
        //company settings seeder section
        ["setting_name"=>"company_name","value"=>"Exciteon Tree of Techonology"],
        ["setting_name"=>"company_slogan","value"=>"Exciteon Tree of Techonology"],
        ["setting_name"=>"company_address","value"=>"No: 63/b 2nd main road"],
        ["setting_name"=>"company_country","value"=>"India"],
        ["setting_name"=>"company_state","value"=>"Tamil Nadu"],
        ["setting_name"=>"company_city","value"=>"Trichy"],
        ["setting_name"=>"company_pincode","value"=>"620021"],
        ["setting_name"=>"company_contact_number","value"=>"9025807876"],
        ["setting_name"=>"company_whatsapp_number","value"=>"7708454539"],
        ["setting_name"=>"company_email","value"=>"admin@exciteon.com"],
        ["setting_name"=>"company_about","value"=>"test about content"],
        ["setting_name"=>"company_fb_link","value"=>"www.facebook.com"],
        ["setting_name"=>"company_youtube_link","value"=>"www.youtube.com"],
        ["setting_name"=>"company_logo","value"=>"http://localhost:8000/assets/admin/images/exciteon-logo.png"],
        ["setting_name"=>"company_water_mark","value"=>"http://localhost:8000/assets/admin/images/exciteon-logo.png"],
        ["setting_name"=>"company_logo_image","value"=>"http://localhost:8000/assets/admin/images/exciteon-logo.png"],
        //end company settings seeder section
        //privacy setting  seeder section
        ["setting_name"=>"company_privacy_policy","value"=>"<h3>TEST PRIVACY POLICY</h3>"],
        ["setting_name"=>"company_refund_policy","value"=>"<h3>TEST REFUND POLICY</h3>"],
        //end privacy setting  seeder section
        //start of color setting seeder
        //privacy setting  seeder section
        ["setting_name"=>"primary_color","value"=>"#6a46e3"],
        ["setting_name"=>"primary_color_dark","value"=>"#000000"],
        ["setting_name"=>"primary_color_light","value"=>"#000000"],
        ["setting_name"=>"secondary_color","value"=>"#000000"],
        ["setting_name"=>"secondary_color_dark","value"=>"#000000"],
        ["setting_name"=>"secondary_color_light","value"=>"#000000"],
        ["setting_name"=>"admin_nav_color","value"=>"#000000"],
        //end of color setting seeder
        //start of seo settings seeder
        ["setting_name"=>"seo_tittle","value"=>"Exciteon"],
        ["setting_name"=>"seo_meta_tittle","value"=>"Exciteon Tree of Techonology"],
        ["setting_name"=>"seo_meta_description","value"=>"Web Design Trichy, SEO, Website Development Company in Trichy"],
        ["setting_name"=>"seo_meta_keywords","value"=>"Software, Digital marketing, Graphic Design, Mobile App, Logo Design"],
        //end of seo settings seeder
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0, $length = count($this->settings_list); $i < $length; $i++) {

            $settings = new ProductSetting();
            $settings->setting_name = $this->settings_list[$i]["setting_name"];
            $settings->value = $this->settings_list[$i]["value"];
            $settings->save();
        }


    }
}
