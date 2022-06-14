<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "user_id" => $this->id,
            "username" => $this->username,
            "email" => $this->email,
            "phone_no" => $this->phonenumber,
            "profile_id" => $this->user_profile_id,
            "match"=>$this->match,
            "status_info"=>StatusResource::make($this->whenLoaded('status')),
            "user_basic_info"=>UserBasicInfoResource::make($this->whenLoaded('userBasicInfo')),
            "user_family_info"=>UserFamilyInfoResource::make($this->whenLoaded('UserFamilyInfo')),
            "user_religion_info"=>UserReligiousInfoResource::make($this->whenLoaded('userReligeonInfo')),
            "user_native_info"=>UserNativeInfoResource::make($this->whenLoaded('userNativeInfo')),
            "user_package_info"=>UserPackageInfoResource::make($this->whenLoaded('userPackageInfo')),
            "user_package_info"=>UserPackageInfoResource::make($this->whenLoaded('userPackageInfo')),
            "created_at" => $this->created_at->format('d-m-y'),
        ];
    }
}
