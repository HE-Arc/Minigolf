<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object")
 */
class Player extends Model
{
    /**
     * @OA\Property(property="user_id",type="integer",description="associed user",example="3"),
     * @OA\Property(property="game_id",type="integer",description="associed game",example="2"),
     */
    protected $table = 'players';
    protected $guarded = ['id',];
    protected $hidden =  ['created_at', 'updated_at',];
    protected $fillable = ['user_id', 'game_id',];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scores()
    {
        return $this->hasMany('App\Score','player_id','id');
    }

    public function game()
    {
        return $this->belongsTo('App\Game');
    }


}
