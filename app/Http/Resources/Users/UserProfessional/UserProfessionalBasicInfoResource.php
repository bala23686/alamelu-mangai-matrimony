<?php

namespace App\Http\Resources\Users\UserProfessional;

use App\Http\Resources\Master\Complexion\ComplexionResource;
use App\Http\Resources\Master\Country\CountryResource;
use App\Http\Resources\Master\HeightMasterResource;
use App\Http\Resources\Master\Language\LangaugeMasterResource;
use App\Http\Resources\Master\MartialStatus\MartialStatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfessionalBasicInfoResource extends JsonResource
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
            "partner_age_from"=>$this->partner_age_from,
            "partner_age_to"=>$this->partner_age_to,
            "partner_height_from"=>$this->partner_height_from==null ? HeightMasterResource::make([]): HeightMasterResource::make($this->whenLoaded('HeightFrom')) ,
            "partner_height_to"=>$this->partner_height_to==null ? HeightMasterResource::make([]): HeightMasterResource::make($this->whenLoaded('HeightTo')) ,
            "partner_martial_status_prefer"=> $this->partner_martial_status==null ? MartialStatusResource::make([]) :  MartialStatusResource::make($this->whenLoaded('MartialStatus')),
            "partner_complexion"=> $this->partner_complexion,
            "partner_mother_tongue"=> $this->partner_mother_tongue,
            "partner_country"=>$this->partner_country,
        ];
    }
}
