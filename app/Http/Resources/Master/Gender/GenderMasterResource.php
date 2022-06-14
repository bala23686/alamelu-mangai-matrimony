<?php

namespace App\Http\Resources\Master\Gender;

use Illuminate\Http\Resources\Json\JsonResource;

class GenderMasterResource extends JsonResource
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
            "gender"=>$this->gender_name ?? ''
        ];
    }
}
