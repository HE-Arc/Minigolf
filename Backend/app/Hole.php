<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hole extends Model
{
    protected $table = 'holes';
    public function course()
    {
        return $this->hasOne('App\Course');
    }
    protected $fillable = [
        'course_id', 'number',
    ];
}
