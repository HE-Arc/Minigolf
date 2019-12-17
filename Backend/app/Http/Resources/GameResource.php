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
            'started' => $this->isStarted,
            'token' => $this->token,
            'date' => $this->date,
            'course' => $this->course != null ? $this->course->id : null,
            'minigolf' => $this->course != null ? $this->course->minigolf_id : null,
            'players' => IdResource::collection($this->users),
        ];
    }
}
