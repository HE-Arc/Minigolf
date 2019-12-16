<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Game extends Model
{
    protected $table = 'games';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'players', 'game_id', 'user_id')
            ->withPivot('id');
    }

    public function players()
    {
        return $this->hasMany('App\Player');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    protected $fillable = [
        'user_id', 'course_id', 'token', 'date'
    ];

    protected $attributes = [
        'isStarted' => false,
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function save(array $options = array())
    {
        if (empty($this->id)) {
            $this->token = Str::upper(Str::random(6));
//            $this->date = now();
        }
        return parent::save($options);
    }

}
