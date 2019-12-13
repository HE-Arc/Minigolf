<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'creator' => $this->user_id,
            'course' => $this->course_id,
            'token' => $this->token,
            'date' => $this->date,
            'course' => $this->course->id,
            'minigolf' => $this->course->minigolf_id,
            'players' => UseridResource::collection($this->players),
        ];
    }
}
