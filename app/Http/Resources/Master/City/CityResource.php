<?php

namespace App\Http\Resources\Master\City;

use App\Http\Resources\Master\State\StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            "id"=>$this->id ?? '',
            "city"=>$this->city_name ?? '',
        ];
    }
}
