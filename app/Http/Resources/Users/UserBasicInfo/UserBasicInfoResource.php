<?php

namespace App\Http\Resources\Users\UserBasicInfo;

use App\Http\Resources\Master\Complexion\ComplexionResource;
use App\Http\Resources\Master\EatingHabit\EatingHabitResource;
use App\Http\Resources\Master\Gender\GenderMasterResource;
use App\Http\Resources\Master\HeightMasterResource;
use App\Http\Resources\Master\Language\LangaugeMasterResource;
use App\Http\Resources\Master\MartialStatus\MartialStatusResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserBasicInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "user" => UserResource::make($this->whenLoaded('user')),
            "user_id" => $this->user_id,
            "user_full_name" => $this->user_full_name,
            "user_mobile_no" => $this->user_mobile_no,
            "user_profile_image" => $this->image_with_path,
            "dob" => $this->dob,
            "about" => $this->about,
            "age" => $this->age,
            "user_address" => $this->user_address,
            "blood_group" => $this->blood_group,
            "tenth_passed" => $this->is_tenth_passed,
            "aadhar_card_no" => $this->adhard_card_no,
            "adhard_card_image" => $this->getadharImageWithPathAttribute(),
            "adhard_card_image_status" => $this->adhard_card_image_is_uploaded,
            "medical_certificate " => $this->getMedicalCertificateWithPathAttribute(),
            "medical_certificate_status" => $this->medical_certificate_uploaded,
            "tenth_marksheet" => $this->getTenthCertificateWithPathAttribute(),
            "tenth_mark_sheet_status" => $this->tenth_mark_sheet_uploaded,
            "twelth_marksheet" => $this->getTwelthCertificateWithPathAttribute(),
            "twelth_mark_sheet_status " => $this->twelth_mark_sheet_uploaded,
            "clg_tc" => $this->getCollegeTcWithPathAttribute(),
            "clg_tc_status" => $this->clg_tc_is_uploaded,
            "gender" => $this->gender_id == null ? GenderMasterResource::make([]) : GenderMasterResource::make($this->whenLoaded('Gender')),
            "height" => $this->user_height_id == null ?  HeightMasterResource::make([]) :  HeightMasterResource::make($this->whenLoaded('Height')),
            "language" => $this->user_mother_tongue == null ? LangaugeMasterResource::make([]) : LangaugeMasterResource::make($this->whenLoaded('MotherTongue')),
            "martial_status" => $this->martial_id == null ? MartialStatusResource::make([]) : MartialStatusResource::make($this->whenLoaded('MartialStatus')),
            "eating_habit" => $this->user_eating_habit_id == null ? EatingHabitResource::make([]) : EatingHabitResource::make($this->whenLoaded('EatingHabit')),
            "complexion" => $this->user_complexion_id == null ? ComplexionResource::make([]) : ComplexionResource::make($this->whenLoaded('Complex')),
            "is_disable" => $this->is_disable,
            "profile_basic_filled_status" => $this->profile_basic_status,
            "profile_religion_filled_status" => $this->profile_religion_status,
            "profile_location_filled_status" => $this->profile_location_status,
            "profile_pro_info_filled_status" => $this->profile_pro_info_status,
            "profile_fam_info_filled_status" => $this->profile_fam_info_status,
            "profile_jakt_info_filled_status" => $this->profile_jakt_info_status,
            "profile_pref_info_filled_status" => $this->profile_pref_info_status,

        ];
    }
}
