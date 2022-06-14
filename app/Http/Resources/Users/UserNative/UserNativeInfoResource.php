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
            "id"=>$this->user_id,
            "country"=>$this->user_country_id==null ? CountryResource::make([]) : CountryResource::make($this->whenLoaded('Country')),
            "state"=> $this->user_state_id==null ?  StateResource::make([]) : StateResource::make($this->whenLoaded('State')),
            "city"=> $this->user_city_id==null ? CityResource::make([]) :CityResource::make($this->whenLoaded('City')),
        ];
    }
}
