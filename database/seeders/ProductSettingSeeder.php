<?php

namespace Database\Seeders;

use App\Models\ProductSetting\ProductSetting;
use Illuminate\Database\Seeder;

class ProductSettingSeeder extends Seeder
{


    public $settings_list = [
        //product settings seeder section
        ["setting_name" => "package_carry_forward", "value" => 0],
        //end product settings seeder section
        //company settings seeder section
        ["setting_name" => "company_name", "value" => "Alamelu Mangai Matrimony"],
        ["setting_name" => "company_slogan", "value" => "திருமண தகவல் மையம்"],
        ["setting_name" => "company_address", "value" => " no : 8/46 west puliwar road , Holy Cross Collage Opp"],
        ["setting_name" => "company_country", "value" => "India"],
        ["setting_name" => "company_state", "value" => "Tamil Nadu"],
        ["setting_name" => "company_city", "value" => "Trichy"],
        ["setting_name" => "company_pincode", "value" => "620002"],
        ["setting_name" => "company_contact_number", "value" => "9092756325"],
        ["setting_name" => "company_whatsapp_number", "value" => "9092756325"],
        ["setting_name" => "company_email", "value" => "admin@alamelumangai.com"],
        ["setting_name" => "company_about", "value" => "Alamelu mangai, as a start-up -matrimonial service was founded with a simple objective - to help people find happiness.
        Unlike other Matrimonial services, we focus on providing detailed family and background information to help you take the next step with confidence.
        We provide matrimonial services for communities like Saiva Vellalar, Iyer and Iyangar.
        Ours will be the most trusted matrimonial service provider to find out the better half of your live."],
        ["setting_name" => "company_fb_link", "value" => "www.facebook.com"],
        ["setting_name" => "company_youtube_link", "value" => "www.youtube.com"],
        ["setting_name" => "company_logo", "value" => "http://localhost:8000/assets/admin/images/exciteon-logo.png"],
        ["setting_name" => "company_water_mark", "value" => "http://localhost:8000/assets/admin/images/exciteon-logo.png"],
        ["setting_name" => "company_logo_image", "value" => "http://localhost:8000/assets/admin/images/exciteon-logo.png"],
        //end company settings seeder section
        //privacy setting  seeder section
        ["setting_name" => "company_privacy_policy", "value" => "To register as a member of Alamelumangaimatrimony.com or use this Site, you must be of legal marriageable age as per the laws of India (currently, 18 years or over for females and 21 years or over for males).
        The Alamelumangaimatrimony.com site is only to facilitate personal advertisement for lawful marriage alliance between persons who are legally competent to enter into matrimony under the laws to which they are subject.
        Membership in the Service is void where prohibited. By using this Site, you represent and warrant that you have the right, authority, and legal capacity to enter into this Agreement and that you are not prohibited or prevented by any applicable law for the time being in force or any order or decree or injunction from any court, tribunal or any such competent authority restraining you from entering into matrimony.
        You also agree to abide by all of the terms and conditions of this Agreement. If at any time Alamelumangaimatrimony.com is of the opinion (in its sole discretion) or has any reason to believe that you are not eligible to become a member or that you have made any misrepresentation about your eligibility,
        Alamelumangaimatrimony.com reserves the right to forthwith terminate your membership and / or your right to use the Service without any refund to you of any of your unutilized subscription fee
        You may terminate your membership at any time, for any reason by writing to Alamelumangaimatrimony.com. In the event you terminate your membership, you will not be entitled to a refund of any unutilized subscription fees
        Alamelumangaimatrimony.com reserves the right in it's sole discretion to review the activity & status of each account & block the account of a member based on such review."],
        ["setting_name" => "company_refund_policy", "value" => "Refund will not be provided back at any cost after registration."],
        //end privacy setting  seeder section
        //start of color setting seeder
        //privacy setting  seeder section
        ["setting_name" => "primary_color", "value" => "#6a46e3"],
        ["setting_name" => "primary_color_dark", "value" => "#000000"],
        ["setting_name" => "primary_color_light", "value" => "#000000"],
        ["setting_name" => "secondary_color", "value" => "#000000"],
        ["setting_name" => "secondary_color_dark", "value" => "#000000"],
        ["setting_name" => "secondary_color_light", "value" => "#000000"],
        ["setting_name" => "admin_nav_color", "value" => "#6a46e3"],
        //end of color setting seeder
        //start of seo settings seeder
        ["setting_name" => "seo_tittle", "value" => "Alamelu Mangai Matrimony"],
        ["setting_name" => "seo_meta_tittle", "value" => "Alamelu Mangai Matrimony"],
        ["setting_name" => "seo_meta_description", "value" => "The No. 1 & most successful Tamil Matrimonial Site. Trusted by lakhs of Tamil Brides & Grooms globally."],
        ["setting_name" => "seo_meta_keywords", "value" => "Alamelu Mangai Matrimonial, Tamil Matrimony"],
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
