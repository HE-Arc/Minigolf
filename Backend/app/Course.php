<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'minigolf_id', 'name',
    ];

    public function minigolf()
    {
        return $this->hasOne('App\Minigolf');
    }

    public function holes()
    {
        return $this->hasMany('App\Hole');
    }
}
