<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @OA\Schema(type="object")
 */
class Game extends Model
{
    /**
     * @OA\Property(property="user_id",type="integer",description="owner",example="2"),
     * @OA\Property(property="course_id",type="integer",description="associated minigolf",example="1"),
     * @OA\Property(property="token",type="string",description="game token",example="LJS5D1"),
     * @OA\Property(property="date",type="string",description="date of game creation",example="2019-11-12T10:10:49"),
     * @OA\Property(property="isStarted",type="boolean",description="game started",example="0"),
     */
    protected $table = 'games';
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'course_id', 'token', 'date'];
    protected $attributes = ['isStarted' => false,];
    protected $casts = ['date' => 'datetime',];
    protected $hidden = ['created_at', 'updated_at'];


    public function users()
    {
        return $this->belongsToMany('App\User', 'players', 'game_id', 'user_id')
            ->withPivot('id');
    }

    public function creator()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function players()
    {
        return $this->hasMany('App\Player');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function save(array $options = array())
    {
        if (empty($this->id)) {
            $this->token = Str::upper(Str::random(6));
//            $this->date = now();
        }
        return parent::save($options);
    }

}
