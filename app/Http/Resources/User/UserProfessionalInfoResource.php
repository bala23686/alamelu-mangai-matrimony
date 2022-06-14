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
            // "education"=>$this->user_education_id->pluck('education_name'),
            "education"=>$this->user_education_id,
            "education_details"=> $this->user_education_details ,
            "job"=> $this->user_job_id==null ? JobResource::make([]): JobResource::make($this->whenLoaded('Job')),
            "job_details"=>$this->user_job_details,
            "job_country"=> $this->user_job_country==null ? CountryResource::make([]) : CountryResource::make($this->whenLoaded('JobCountry')) ,
            "job_state"=>$this->user_job_state==null ?  StateResource::make([]) : StateResource::make($this->whenLoaded('JobState')),
            "job_city"=>$this->user_job_city==null ? CityResource::make([]) : CityResource::make($this->whenLoaded('JobCity')),
            "annual_income"=>$this->user_annual_income

        ];
    }
}
