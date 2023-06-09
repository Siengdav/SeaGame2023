<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id'=>$this->id,
            'userName'=>$this->userName,
            'email'=>$this->emial,
            'password'=>$this->password,
            'events'=>$this->events,
        ];
    }
}
