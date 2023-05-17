<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nameSport' => $this->nameSport,
            'dateStart' => $this->dateStart,
            'timeStart' => $this->timeStart,
            'venue' => $this->venue,
            'teams' =>TeamResource::collection($this->teams),
            'user_id'=>$this->user,
        ];
    }
}
