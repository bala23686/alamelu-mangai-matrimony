<?php

namespace App\Http\Resources\UserPhoto;

use Illuminate\Http\Resources\Json\JsonResource;

class UserPhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            // "user_images" => $this->getImageFullPathAttribute(),
            "photo_status" => $this->user_photo_status,
        ];
    }
}
