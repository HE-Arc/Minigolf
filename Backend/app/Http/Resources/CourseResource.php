<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'id'=> $this->id,
            'name'=> $this->name,
            'minigolf' => $this->minigolf_id,
            'description' => $this->description,
            'image' => $this->image,
            'holes' => IdResource::collection($this->holes),
        ];
    }
}
