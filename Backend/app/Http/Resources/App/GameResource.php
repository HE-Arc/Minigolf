<?php

namespace App\Http\Resources\App;

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
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'creator' => $this->creator->name,
            'started' => $this->isStarted,
            'token' => $this->token,
            'date' => $this->date,
            'course' => $this->course != null ? $this->course->name: null,
            'id_course' => $this->course != null ? $this->course->id: null,
            'minigolf' => $this->course != null ? $this->course->minigolf->name : null,
            'id_minigolf' => $this->course != null ? $this->course->minigolf->id : null,
            'players' => PlayerResource::collection($this->players),
        ];
    }
}
