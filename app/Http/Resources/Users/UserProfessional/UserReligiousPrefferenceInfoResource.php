<?php

namespace App\Http\Resources\Users\UserProfessional;

use App\Http\Resources\Master\CasteMasterResource;
use App\Http\Resources\Master\Rasi\RasiResource;
use App\Http\Resources\Master\ReligionMasterResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserReligiousPrefferenceInfoResource extends JsonResource
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
        "user_id"=> $this->user_id,
        "partner_religion"=>$this->partner_religion==null ? ReligionMasterResource::make([]) : ReligionMasterResource::make($this->whenLoaded('Religion')),
        "partner_caste"=>$this->partner_caste ? CasteMasterResource::make([]) : CasteMasterResource::make($this->whenLoaded('Caste')),
        "partner_rasi"=>$this->partner_rasi
        ];
    }
}
