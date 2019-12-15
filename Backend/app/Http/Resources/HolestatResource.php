<?php

namespace App\Http\Resources;

use App\Course;
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
        return parent::toArray($request);
        return [
            'id' => $this->id,
            'number' => $this->number,
            'course' => $this->course_id,
            'minigolf' => $course->minigolf_id,
            'best' => $this->scores->min('score'),
            'worse' => $this->scores->max('score'),
            'average' => $this->scores->avg('score'),
            'median' => $this->scores->median('score'),
            'count' => $this->scores->count('score')
        ];
    }

}
