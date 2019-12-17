<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(type="object")
 */
class Hole extends Model
{
    /**
     * @OA\Property(property="course_id",type="integer",description="associated minigolf",example="2"),
     * @OA\Property(property="number",type="string",description="associated minigolf",example="1"),
     */
    protected $table = 'holes';
    protected $guarded = ['id',];
    protected $hidden =  ['created_at', 'updated_at',];
    protected $fillable = ['course_id', 'number',];

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
