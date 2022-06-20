<?php

namespace App\Http\Resources\Users\UserProfessional;

use App\Http\Resources\Master\Country\CountryResource;
use App\Http\Resources\Master\Education\EducationResource;
use App\Http\Resources\Master\Job\JobResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfessionalPrefferenceInfoResource extends JsonResource
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
            "partner_education"=>$this->partner_education,
            "partner_education_details"=>$this->partner_education_details,
            "partner_job"=>$this->partner_job,
            "partner_job_details"=>$this->partner_job_details,
            "partner_job_country"=>$this->partner_job_country,
            "partner_salary"=>$this->partner_salary
        ];
    }
}
