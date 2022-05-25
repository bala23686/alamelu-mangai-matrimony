<?php

namespace App\Http\Resources\Users\UserNative;

use App\Http\Resources\Master\City\CityResource;
use App\Http\Resources\Master\Country\CountryResource;
use App\Http\Resources\Master\State\StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNativeInfoResource extends JsonResource
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
            "country"=>CountryResource::make($this->whenLoaded('Country')),
            "state"=>StateResource::make($this->whenLoaded('State')),
            "city"=>CityResource::make($this->whenLoaded('City')),
        ];
    }
}
