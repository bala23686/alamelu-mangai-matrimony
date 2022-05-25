<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Master\City\CityResource;
use App\Http\Resources\Master\Country\CountryResource;
use App\Http\Resources\Master\Education\EducationResource;
use App\Http\Resources\Master\Job\JobResource;
use App\Http\Resources\Master\State\StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfessionalInfoResource extends JsonResource
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

            "id"=>$this->user_id,
            "education"=>EducationResource::collection($this->user_education_id),
            "education_details"=>$this->user_education_details,
            "job"=>JobResource::make($this->whenLoaded('Job')),
            "job_details"=>$this->user_job_details,
            "country"=>CountryResource::make($this->whenLoaded('JobCountry')),
            "state"=>StateResource::make($this->whenLoaded('JobState')),
            "city"=>CityResource::make($this->whenLoaded('JobCity')),
            "annual_income"=>$this->user_annual_income

        ];
    }
}
