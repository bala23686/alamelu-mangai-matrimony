<?php

namespace App\Actions\Package;

use App\Helpers\Model\ProductSetting\PackageSettingHelper;
use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use Carbon\Carbon;

class PackageAction
{

    private int $user_id;
    private int $purchased_package_id;

    /**
     * PackageAction function
     * This Action handles the updation of User Packages
     * @param integer $user_id
     *
     */
    public function __construct(int $user_id)
    {
        $this->user_id=$user_id;
    }


    public function purchasedPackage(int $id):self
    {
        $this->purchased_package_id=$id;
        return $this;
    }

    /**
     * purchaseNewPackAge function
     * This function handle the purchase of new package purchased by user
     * @return void
     */
    public function purchaseNewPackAge()
    {
        $packageSetting = PackageSettingHelper::all();

       return  ($packageSetting->package_carry_forward==0)
         ? //section if runs if the package carry forward setting is disabled

         $this->updatePackageWithOutCarryForward()

         ://section if runs if the package carry forward setting is enabled
         $this->updatePackageWithCarryForward();
    }



    /**
     * updatePackageWithOutCarryForward function
     * this function updates the user pakcage info without
     * carry forwarding the last balance
     * @return bool
     */
    private function updatePackageWithOutCarryForward():bool
    {
        $pakcage_info=$this->getPackAgeInfo();
        $is_purchased=UserPackageInfoMaster::where('user_id',$this->user_id)
                        ->update([
                            "user_package_id"=>$pakcage_info->id,
                            "user_views_remaining"=>$pakcage_info->package_allowed_profile,
                            "photo_upload_remaining"=>$pakcage_info->package_photo_upload,
                            "interest_remaining"=>$pakcage_info->package_interest_allowed,
                            "expires_on"=>Carbon::now()->addDays($pakcage_info->package_valid_for*30),
                            "is_expired"=>0,
                        ]);


        return $is_purchased ? true : false;
    }



    /**
     * updatePackageWithCarryForward function
     * this function updates the user pakcage info without
     * carry forwarding the last balance
     * @return bool
     */
    private function updatePackageWithCarryForward():bool
    {
        $pakcage_info=$this->getPackAgeInfo();
        $user_package_info=UserPackageInfoMaster::where('user_id',$this->user_id)->first();

        //updating the user with carry forwarding with old package remaings
        $is_purchased= $user_package_info->update([
            "user_package_id"=>$pakcage_info->id,
            "user_views_remaining"=>$user_package_info->user_views_remaining+$pakcage_info->package_allowed_profile,
            "photo_upload_remaining"=>$user_package_info->photo_upload_remaining+$pakcage_info->package_photo_upload,
            "interest_remaining"=>$user_package_info->interest_remaining+$pakcage_info->package_interest_allowed,
            "expires_on"=>Carbon::now()->addDays($pakcage_info->package_valid_for*30),
            "is_expired"=>0,
        ]);

        return $is_purchased ? true : false;
    }



    private function getPackAgeInfo():PackageMaster
    {
        return PackageMaster::find($this->purchased_package_id);
    }
}
