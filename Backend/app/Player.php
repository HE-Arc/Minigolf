<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
    protected $hidden =  ['created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function scores()
    {
        return $this->hasMany('App\Score','player_id','id');
    }

    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    protected $fillable = [
        'user_id', 'game_id'
    ];
}
