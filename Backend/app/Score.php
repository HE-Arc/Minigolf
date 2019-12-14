<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Score extends Pivot
{
    protected $table = 'scores';
    protected $hidden =  ['created_at', 'updated_at'];

    public function holes()
    {
        $this->belongsToMany('App\Hole');
    }

    public function players()
    {
        $this->belongsToMany('App\Player');
    }


    protected $fillable = [
        'player_id', 'hole_id', 'score',
    ];
}
