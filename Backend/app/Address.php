<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'city', 'canton', 'postalcode', 'address1',
    ];
}
