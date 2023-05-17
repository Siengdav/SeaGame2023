<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'id' => $this->id,
            'nameSport' => $this->nameSport,
            'dateStart' => $this->dateStart,
            'timeStart' => $this->timeStart,
            'venue' => $this->venue,
            'created_by'=>$this->user,
        ];
    }
}
