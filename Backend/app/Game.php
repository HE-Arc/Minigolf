<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Game extends Model
{
    public function user()
    {
        $this->hasOne('App\User');
    }

    protected $table = 'games';
    protected $fillable = [
        'user_id', 'token', 'date'
    ];

    protected $attributes = [
            'isStarted' => false,
        ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function save(array $options = array())
    {
        if(empty($this->id)) {
            $this->token = Str::random(6);
            $this->date = now();
        }
        return parent::save($options);
    }

}
