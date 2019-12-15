<?php

namespace App\Http\Resources;

use App\Course;
use App\Score;
use Illuminate\Http\Resources\Json\JsonResource;

class HolestatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'number' => $this->number,
            'course' => $this->course_id,
            'best' => $this->scores->min('score'),
            'worse' => $this->scores->max('score'),
            'average' => round($this->scores->avg('score'),2),
            'median' => round($this->scores->median('score'),2),
            'count' => $this->scores->count('score'),
            'scores' => HoleResource::collection($this->scores)
        ];
    }

}
