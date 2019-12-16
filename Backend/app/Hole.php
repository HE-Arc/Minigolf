<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hole extends Model
{
    protected $table = 'holes';
    protected $guarded = ['id'];
    protected $hidden =  ['created_at', 'updated_at'];

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    protected $fillable = [
        'course_id', 'number',
    ];
}
