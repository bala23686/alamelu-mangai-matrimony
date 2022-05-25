<?php

namespace App\Http\Resources\Master\Rasi;

use Illuminate\Http\Resources\Json\JsonResource;

class RasiResource extends JsonResource
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
            "rasi"=>$this->rasi_name
        ];
    }
}
