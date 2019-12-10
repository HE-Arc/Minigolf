<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
    public function holes()
    {
        $this->hasMany('App\Hole');
    }

    public function players()
    {
        $this->hasMany('App\Player');
    }


    protected $fillable = [
        'player_id', 'hole_id', 'score',
    ];
}
