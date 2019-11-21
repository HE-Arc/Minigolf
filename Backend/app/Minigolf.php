<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minigolf extends Model
{
    protected $fillable = [
        'name', 'city', 'canton', 'numpostal', 'phone', 'email',
    ];
}
