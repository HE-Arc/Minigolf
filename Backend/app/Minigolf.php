<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minigolf extends Model
{
    protected $table = 'minigolfs';

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    protected $fillable = [
        'name', 'description', 'address', 'canton', 'zipcode', 'phone', 'email', 'longitude', 'latitude', 'icon',
    ];
}
