<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function user()
    {
        $this->hasOne('App\User');
    }

    protected $table = 'games';
    protected $fillable = [
        'user_id',
    ];
}
