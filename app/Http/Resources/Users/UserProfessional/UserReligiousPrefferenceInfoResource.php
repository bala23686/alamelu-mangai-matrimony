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
        "partner_religion"=> ReligionMasterResource::make($this->whenLoaded('Religion')),
        "partner_caste"=>CasteMasterResource::make($this->whenLoaded('Caste')),
        "partner_rasi"=>RasiResource::collection($this->partner_rasi)
        ];
    }
}
