<?php

namespace App;

use App\Http\Resources\HoleCollection;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $guarded = ['id'];
    protected $fillable = [
        'minigolf_id', 'name',
    ];
    protected $hidden =  ['created_at', 'updated_at'];

    public function minigolf()
    {
        return $this->belongsTo('App\Minigolf');
    }

    public function holes()
    {
        return $this->hasMany('App\Hole');
    }
}
