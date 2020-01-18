<?php

namespace App\Http\Resources\App;

use Illuminate\Http\Resources\Json\JsonResource;

class MinigolfResource extends JsonResource
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
            'name' => $this->name,
            'desc' => $this->description,
            'city' => $this->city,
            'address' => $this->address,
            'long' => $this->long,
            'lat' => $this->lat,
            'zipcode' => $this->zipcode,
            'phone' => $this->phone,
            'emain' => $this->email,
            'image' => $this->image,
            'courses' => $this->courses != null ? CourseResource::collection($this->courses): null,
        ];
    }
}
