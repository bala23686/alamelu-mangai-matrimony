<?php

namespace App\Services\Website\DashboardServices\ProfileServices;

use App\Helpers\File\ImageUploadHelper\ImageUploadHelper;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\User;
use Illuminate\Http\Request;

class HoroscopeDetailsUpdateServices
{
    public function HandleHoroscopeDetails(Request $request)
    {
    }



    public function updateRasiKatamDetails(Request $request, $id)
    {

        $data = [
            "rasi_katam_row_1_col_1" => $request->rasi_katam_row_1_col_1,
            "rasi_katam_row_1_col_2" => $request->rasi_katam_row_1_col_2,
            "rasi_katam_row_1_col_3" => $request->rasi_katam_row_1_col_3,
            "rasi_katam_row_1_col_4" => $request->rasi_katam_row_1_col_4,
            "rasi_katam_row_2_col_1" => $request->rasi_katam_row_2_col_1,
            "rasi_katam_row_2_col_4" => $request->rasi_katam_row_2_col_4,
            "rasi_katam_row_3_col_1" => $request->rasi_katam_row_3_col_1,
            "rasi_katam_row_3_col_4" => $request->rasi_katam_row_3_col_4,
            "rasi_katam_row_4_col_1" => $request->rasi_katam_row_4_col_1,
            "rasi_katam_row_4_col_2" => $request->rasi_katam_row_4_col_2,
            "rasi_katam_row_4_col_3" => $request->rasi_katam_row_4_col_3,
            "rasi_katam_row_4_col_4" => $request->rasi_katam_row_4_col_4,
            "user_jathakam_rasi_katam_is_filled" => 1,
        ];

        $is_saved = User::find($id)
            ->userHoroScopeInfo()
            ->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_jakt_info_status" => 1])
            : false;

        return $is_saved ? true : false;
    }



    public function updateNavamsamKatamDetails(Request $request, $id)
    {

        $data = [
            "navam_katam_row_1_col_1" => $request->navam_katam_row_1_col_1,
            "navam_katam_row_1_col_2" => $request->navam_katam_row_1_col_2,
            "navam_katam_row_1_col_3" => $request->navam_katam_row_1_col_3,
            "navam_katam_row_1_col_4" => $request->navam_katam_row_1_col_4,
            "navam_katam_row_2_col_1" => $request->navam_katam_row_2_col_1,
            "navam_katam_row_2_col_4" => $request->navam_katam_row_2_col_4,
            "navam_katam_row_3_col_1" => $request->navam_katam_row_3_col_1,
            "navam_katam_row_3_col_4" => $request->navam_katam_row_3_col_4,
            "navam_katam_row_4_col_1" => $request->navam_katam_row_4_col_1,
            "navam_katam_row_4_col_2" => $request->navam_katam_row_4_col_2,
            "navam_katam_row_4_col_3" => $request->navam_katam_row_4_col_3,
            "navam_katam_row_4_col_4" => $request->navam_katam_row_4_col_4,
            "user_jathakam_navamsam_katam_is_filled" => 1,
        ];

        $is_saved = User::find($id)
            ->userHoroScopeInfo()
            ->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_jakt_info_status" => 1])
            : false;

        return $is_saved ? true : false;
    }



    public function updateJathakamImage(Request $request, $id)
    {


        $data = [
            "user_jathakam_image" => ImageUploadHelper::storeImageWithWaterMark($request->user_jathakam_image, UserHoroscopeInfoMaster::JATHAKAM_IMAGE_PATH),
            "user_jathakam_image_is_uploaded" => 1
        ];

        $is_saved = User::find($id)
            ->userHoroScopeInfo()
            ->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_jakt_info_status" => 1])
            : false;

        return $is_saved ? true : false;
    }
}
