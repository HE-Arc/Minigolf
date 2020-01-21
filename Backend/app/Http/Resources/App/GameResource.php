<?php

namespace App\Http\Resources\App;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

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
        return collect([
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
        ]);

        return $collection->sortByDesc(function ($transaction, $key) {
            return Carbon::parse($transaction['date'])->timestamp;
        });


    }
}
