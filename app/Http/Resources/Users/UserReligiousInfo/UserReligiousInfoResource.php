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
            "id"=>$this->id,
            "religion"=>ReligionMasterResource::make($this->whenLoaded('BelognsToReligion')),
            "caste"=>CasteMasterResource::make($this->whenLoaded('BelongsToCaste')),
            "sub_caste"=>$this->sub_caste,
            "rasi"=>RasiResource::make($this->whenLoaded('BelongsToRasi')),
            "star"=>StarResource::make($this->whenLoaded('BelongsToStar')),
            "birth_time"=>$this->user_birth_time,
            "birth_place"=>$this->user_birth_place,
            "dhosam"=>$this->dhosam
        ];
    }
}
