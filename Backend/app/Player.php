<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
    protected $hidden =  ['created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function games()
    {
        return $this->belongsToMany('App\Game');
    }

    protected $fillable = [
        'user_id', 'game_id'
    ];
}