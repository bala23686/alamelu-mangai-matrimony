<?php

namespace  App\Services\Website\DashboardServices\ProfileServices;

use App\Helpers\File\ImageUploadHelper\ImageUploadHelper;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BasicDetailsUpdateServices
{
    public function HandleBasicDetails(Request $request, $id)
    {
        $data = [
            "user_full_name" => $request->user_full_name,
            "user_mobile_no" => $request->mobile,
            "about" => $request->about,
            "age" => $request->age,
            "dob" => $request->dob,
            "user_address" => $request->user_address,
            "blood_group" => $request->blood_group,
            "gender_id" => $request->gender,
            "is_tenth_passed" => $request->is_tenth_passed,
            "user_height_id" => $request->height,
            "user_complexion_id" => $request->user_complexion,
            "user_mother_tongue" => $request->mother_tongue,
            "martial_id" => $request->martial_status,
            "user_eating_habit_id" => $request->eating_habit,
            "is_disable" => $request->disability,
            "profile_basic_status" => 1
        ];


        $is_saved = User::find($id)
            ->userBasicInfo()
            ->updateOrCreate(['user_id' => $id], $data);


        return $is_saved ? true : false;
    }



    public function handleMedicalCertificateUpload($medical_certificate, $id)
    {

        $data = [
            "medical_certificate" => $medical_certificate,
            "medical_certificate_uploaded_on" => Carbon::now(),
        ];


        $is_saved = User::find($id)
            ->userBasicInfo()
            ->updateOrCreate(['user_id' => $id], $data);


        return $is_saved ? true : false;
    }


    public function handleTenthCertificateUpload($tenth_certificate, $id)
    {

        $data = [
            "tenth_marksheet" => $tenth_certificate,
            "tenth_mark_sheet_uploaded" => 1,
        ];

        $is_saved = User::find($id)
            ->userBasicInfo()
            ->updateOrCreate(['user_id' => $id], $data);


        return $is_saved ? true : false;
    }


    public function handleTwelthCertificateUpload($twelth_certificate, $id)
    {

        $data = [
            "twelth_marksheet" => $twelth_certificate,
            "twelth_mark_sheet_uploaded" => 1,
        ];

        $is_saved = User::find($id)
            ->userBasicInfo()
            ->updateOrCreate(['user_id' => $id], $data);


        return $is_saved ? true : false;
    }


    public function handleClgTcUpload($clg_tc, $id)
    {

        $data = [
            "clg_tc" => $clg_tc,
            "clg_tc_is_uploaded" => 1,
        ];

        $is_saved = User::find($id)
            ->userBasicInfo()
            ->updateOrCreate(['user_id' => $id], $data);


        return $is_saved ? true : false;
    }


    public function handleAdharCardUpload($adharCard, $adharNo,$id)
    {

        $data = [
            "adhard_card_image" => $adharCard,
            "adhard_card_no" => $adharNo,
            "adhard_card_image_is_uploaded" => 1,
        ];

        $is_saved = User::find($id)
            ->userBasicInfo()
            ->updateOrCreate(['user_id' => $id], $data);


        return $is_saved ? true : false;
    }
}
