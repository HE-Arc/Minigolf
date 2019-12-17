<?php

namespace App\Http\Resources;
use App\Score;

use Illuminate\Http\Resources\Json\JsonResource;

class HoleResource extends JsonResource
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
            'user' => $this->player->user_id,
            'game' => $this->player->game_id,
            'score' => $this->score,
        ];
    }
}
