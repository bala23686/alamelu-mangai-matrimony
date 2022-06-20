<?php

namespace App\Http\Resources\Master\EatingHabit;

use Illuminate\Http\Resources\Json\JsonResource;

class EatingHabitResource extends JsonResource
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
            "habit"=>$this->habit_type_name ?? ''
        ];
    }
}
