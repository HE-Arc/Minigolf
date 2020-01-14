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
            'minigolf' => $this->course != null ? $this->course->minigolf->name : null,
            'players' => PlayerResource::collection($this->players),
        ];
    }
}
