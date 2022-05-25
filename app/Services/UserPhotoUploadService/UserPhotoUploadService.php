<?php

namespace App\Services\UserPhotoUploadService;

use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPhotoMaster\UserPhotoMaster;

class UserPhotoUploadService
{

     public function handleUserPhotos($file_name,$user_id)
     {
        $user_package_info=UserPackageInfoMaster::where('user_id',$user_id)->first();

        if($user_package_info->photo_upload_remaining>0 && $user_package_info->is_expired==0)
        {
           if( $user_package_info->decrement('photo_upload_remaining',1))
           {
              $is_uploaded=UserPhotoMaster::create([
                   "user_id"=> (int)$user_package_info->user_id,
                   "user_photo"=>$file_name
               ]);

              return  $is_uploaded
               ? true
               : false;
           }
        }

        return false;
     }
}
