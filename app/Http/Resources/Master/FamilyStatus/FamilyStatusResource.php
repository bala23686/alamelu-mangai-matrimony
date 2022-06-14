<?php

namespace App\Http\Resources\Master\FamilyStatus;

use Illuminate\Http\Resources\Json\JsonResource;

class FamilyStatusResource extends JsonResource
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
            "family_type"=>$this->family_type_name ?? '',
        ];
    }
}
