<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(type="object")
 */
class Score extends Model
{
    /**
     * @OA\Property(property="player_id",type="integer",description="associed player",example="3"),
     * @OA\Property(property="hole_id",type="integer",description="associed hole",example="2"),
     */
    protected $table = 'scores';
    protected $guarded = ['id',];
    protected $hidden =  ['created_at', 'updated_at',];
    protected $fillable = ['player_id', 'hole_id', 'score',];

    public function hole()
    {
        return $this->belongsTo('App\Hole');
    }

    public function player()
    {
        return $this->belongsTo('App\Player');
    }

}
