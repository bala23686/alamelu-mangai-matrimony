<?php

namespace App\Http\Controllers\Admin\ProductSetting;

use App\Helpers\File\ImageUploadHelper\ImageUploadHelper;
use App\Helpers\Model\ProductSetting\CompanySettingHelper;
use App\Helpers\Model\ProductSetting\PackageSettingHelper;
use App\Helpers\Model\ProductSetting\PrivacySettingHelper;
use App\Helpers\Model\ProductSetting\SeoSettingHelper;
use App\Helpers\Model\ProductSetting\ThemeSettingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductSetting\CompanyInformationRequest;
use App\Models\ProductSetting\ProductSetting;
use Illuminate\Http\Request;

class ProductSettingController extends Controller
{


    /**
     * index function
     * This function handles the view of settings page
     * @return void
     */
    public function index()
    {

        return view('Admin.ProductSetting.index', [
            "productSettingInfo" => PackageSettingHelper::all(),
            "companySettingInfo"=>CompanySettingHelper::all(),
            "privacySettingInfo"=>PrivacySettingHelper::all(),
            "themeSettingInfo"=>ThemeSettingHelper::all(),
            "seoSettingInfo"=>SeoSettingHelper::all(),
        ]);
    }



    /**
     * updatepackageSetting function
     * This function updates the over all settings related to pakcage
     * @param Request $request
     * @return void
     */
    public function updatepackageSetting(Request $request)
    {
        $request->validate([
            'package_carry_forward' => 'required',
        ]);

        $product_setting=new PackageSettingHelper();

        $product_setting->package_carry_forward=$product_setting->package_carry_forward == 0 ? 1 : 0;

        $is_saved=$product_setting->save();

        return  $is_saved
            ? response()->json(['message' => 'Package Setting Info Updated'], 201)
            : response()->json(['message' => ''], 500);
    }



    public function updateCompanySetting(CompanyInformationRequest $request)
    {

        $settings=new CompanySettingHelper();

        $settings->company_name=$request->company_name;
        $settings->company_slogan=$request->company_slogan;
        $settings->company_address=$request->company_address;
        $settings->company_state=$request->company_state;
        $settings->company_city=$request->company_city;
        $settings->company_country=$request->company_country;
        $settings->company_pincode=$request->company_pincode;
        $settings->company_contact_number=$request->company_contact_number;
        $settings->company_whatsapp_number=$request->company_whatsapp_number;
        $settings->company_email=$request->company_email;
        $settings->company_about=$request->company_about;
        $settings->company_fb_link=$request->company_fb_link;
        $settings->company_youtube_link=$request->company_youtube_link;

        $is_saved=$settings->save();

        return  $is_saved
            ? response()->json(['message' => 'Company Setting Info Updated'], 201)
            : response()->json(['message' => ''], 500);

    }



    public function updatePolicySetting(Request $request)
    {

        $privacy_setting=new PrivacySettingHelper();

        $privacy_setting->company_privacy_policy=$request->privacyPolicy==[] ? $privacy_setting->company_privacy_policy : $request->privacyPolicy ;
        $privacy_setting->company_refund_policy=$request->refundPolicy==[] ? $privacy_setting->company_refund_policy : $request->refundPolicy ;

        $is_saved=$privacy_setting->save();

        return  $is_saved
            ? response()->json(['message' => 'Privacy Info Updated'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function uploadCompanyLogo(Request $request)
    {
        $this->validate($request,[
            "company_logo"=>'required|mimes:png,jpg'
        ]);

       $file_name= ImageUploadHelper::storeImage($request->company_logo,CompanySettingHelper::LOGO_IMAGE_PATH);

       $image_with_url=Url('/') .'/uploads'.CompanySettingHelper::LOGO_IMAGE_PATH . "{$file_name}";

        $company_setting=new CompanySettingHelper();

        $company_setting->company_logo=$image_with_url;
        $company_setting->company_logo_image=$file_name;

        $is_saved=$company_setting->save();

        return  $is_saved
        ? response()->json(['message' => 'Company Logo uploaded'], 201)
        : response()->json(['message' => ''], 500);

    }


    public function uploadCompanyWaterMark(Request $request)
    {
        $this->validate($request,[
            "company_water_mark"=>'required|mimes:png'
        ]);

       $file_name= ImageUploadHelper::storeImage($request->company_water_mark,CompanySettingHelper::WATER_MARK_IMAGE_PATH);

       $image_with_url=Url('/').'/uploads'.CompanySettingHelper::WATER_MARK_IMAGE_PATH . "{$file_name}";

        $company_setting=new CompanySettingHelper();

        $company_setting->company_water_mark=$image_with_url;

        $is_saved=$company_setting->save();

        return  $is_saved
        ? response()->json(['message' => 'Company WaterMark uploaded'], 201)
        : response()->json(['message' => ''], 500);
    }


    public function updateThemeColor(Request $request)
    {


        $theme_setting=new ThemeSettingHelper();

        $theme_setting->primary_color=$request->primary_color;
        $theme_setting->primary_color_dark=$request->primary_color_dark;
        $theme_setting->primary_color_light=$request->primary_color_light;
        $theme_setting->secondary_color=$request->secondary_color;
        $theme_setting->secondary_color_dark=$request->secondary_color_dark;
        $theme_setting->secondary_color_light=$request->secondary_color_light;
        $theme_setting->admin_nav_color=$request->admin_nav_color;

        $is_saved=$theme_setting->save();


        return  $is_saved
            ? response()->json(['message' => 'Theme Color Changed'], 201)
            : response()->json(['message' => ''], 500);
    }




    public function updateSeoSettings(Request $request)
    {

        $seo_settings=new SeoSettingHelper();

        $seo_settings->seo_tittle=$request->seo_tittle;
        $seo_settings->seo_meta_tittle=$request->seo_meta_tittle;
        $seo_settings->seo_meta_description=$request->seo_meta_description;
        $seo_settings->seo_meta_keywords=$request->seo_meta_keywords;

        $is_saved=$seo_settings->save();

        return  $is_saved
            ? response()->json(['message' => 'Seo Settings Updated'], 201)
            : response()->json(['message' => ''], 500);
    }
}
