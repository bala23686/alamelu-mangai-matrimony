<?php

namespace App\Http\Resources\Users\UserFamilyInfo;

use App\Http\Resources\Master\FamilyStatus\FamilyStatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserFamilyInfoResource extends JsonResource
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
            "user_id"=>$this->user_id,
            "father_name"=>$this->user_father_name  ,
            "father_job_details"=>$this->user_father_job_details ,
            "mother_name"=>$this->user_mother_name ,
            "mother_job_details"=>$this->user_mother_job_details ,
            "family_status"=> $this->user_family_status==null  ? FamilyStatusResource::make([]) : FamilyStatusResource::make($this->whenLoaded('FamilyStatusSubMaster')),
            "no_of_brothers"=>$this->no_of_brothers  ,
            "no_of_sisters"=>$this->no_of_sisters ,
            "no_of_brothers_married"=>$this->no_of_brothers_married ,
            "no_of_sisters_married"=>$this->no_of_sisters_married ,
            "sibling_details"=>$this->user_sibling_details,
        ];
    }
}
