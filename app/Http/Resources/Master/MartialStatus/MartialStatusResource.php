<?php

namespace App\Http\Resources\Master\MartialStatus;

use Illuminate\Http\Resources\Json\JsonResource;

class MartialStatusResource extends JsonResource
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
            "martial_status"=>$this->martial_status_name,
        ];
    }
}
