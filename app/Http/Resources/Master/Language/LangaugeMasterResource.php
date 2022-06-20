<?php

namespace App\Http\Resources\Master\Language;

use Illuminate\Http\Resources\Json\JsonResource;

class LangaugeMasterResource extends JsonResource
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
            "language"=>$this->language_name ?? ''
        ];
    }
}
