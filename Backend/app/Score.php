<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
    protected $guarded = ['id'];
    protected $hidden =  ['created_at', 'updated_at'];
    protected $fillable = [
        'player_id', 'hole_id', 'score',
    ];

    public function hole()
    {
        return $this->belongsTo('App\Hole');
    }

    public function player()
    {
        return $this->belongsTo('App\Player');
    }

}
