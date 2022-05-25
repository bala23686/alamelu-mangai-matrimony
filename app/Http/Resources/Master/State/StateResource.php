<?php

namespace App\Http\Resources\Master\State;

use App\Http\Resources\Master\Country\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
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
            "state"=>$this->state_name,
            "country"=>CountryResource::make($this->whenLoaded('Country'))
        ];
    }
}
