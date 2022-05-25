<?php

namespace App\Http\Resources\Master\Star;

use App\Http\Resources\Master\Rasi\RasiResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StarResource extends JsonResource
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
            "star"=>$this->star_name,
            "rasi"=>RasiResource::make($this->whenLoaded('Rasi'))
        ];
    }
}
