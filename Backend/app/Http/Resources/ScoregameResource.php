<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Parent_;

class ScoregameResource extends JsonResource
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
            'game' => $this->id,
            'course' => $this->course_id,
            'score' => ScorescoreResource::collection($this->players)
        ];
    }
}
