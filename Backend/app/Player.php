<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
    protected $fillable = [
        'user_id', 'game_id'
    ];
}
