<?php

namespace App\Http\Resources\Master;

use Illuminate\Http\Resources\Json\JsonResource;

class CasteMasterResource extends JsonResource
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
            'id'=>$this->id,
            'caste_name'=>$this->caste_name,
            'caste_religion'=>$this->caste_religion,
            'religion_info'=>ReligionMasterResource::make($this->whenLoaded('Religion')),
        ];
    }
}
