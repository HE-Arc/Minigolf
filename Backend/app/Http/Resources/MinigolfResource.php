<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Reduce\IdResource;

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

        return [
            'id'=> $this->id,
            'name' => $this->name,
            'description'=> $this->description,
            'address'=> $this->address,
            'city' => $this->city,
            'zipcode' => $this->zipcode,
            'phone'=> $this->phone,
            'email' => $this->email,
            'long' => $this->long,
            'lat' => $this->lat,
            'image' => $this->image,
            'courses' => IdResource::collection($this->courses),
        ];
    }
}
