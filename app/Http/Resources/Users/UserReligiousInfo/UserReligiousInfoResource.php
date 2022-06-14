<?php

namespace App\Http\Resources\Users\UserReligiousInfo;

use App\Http\Resources\Master\CasteMasterResource;
use App\Http\Resources\Master\Rasi\RasiResource;
use App\Http\Resources\Master\ReligionMasterResource;
use App\Http\Resources\Master\Star\StarResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserReligiousInfoResource extends JsonResource
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
            "religion"=>$this->user_religion_id==null ? ReligionMasterResource::make([]): ReligionMasterResource::make($this->whenLoaded('BelognsToReligion')),
            "caste"=>$this->user_caste_id==null ? CasteMasterResource::make([]) : CasteMasterResource::make($this->whenLoaded('BelongsToCaste') ) ,
            "sub_caste"=>$this->sub_caste,
            "rasi"=>$this->user_rasi_id==null ? RasiResource::make([]) : RasiResource::make($this->whenLoaded('BelongsToRasi')) ,
            "star"=>$this->user_star_id==null ? StarResource::make([]) :StarResource::make($this->whenLoaded('BelongsToStar')) ,
            "birth_time"=>$this->user_birth_time ,
            "birth_place"=>$this->user_birth_place ,
            "dhosam"=>$this->dhosam
        ];
    }
}
