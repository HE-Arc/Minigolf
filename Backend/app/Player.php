<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    public function users()
    {
        $this->hasMany('App\User');
    }

    public function games()
    {
        $this->hasMany('App\Game');
    }

    protected $fillable = [
        'user_id', 'game_id'
    ];
}
