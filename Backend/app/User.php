<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;


/**
 * @OA\Schema(type="object")
 */
class User extends Authenticatable implements JWTSubject
{
    /**
     * @OA\Property(property="name",type="string",description="user name",example="Eric Zemmour"),
     * @OA\Property(property="email",type="string",description="minigolf email",example="eric.zemour@gmail.com"),
     * @OA\Property(property="role",type="string",description="user role",example="user"),
     * @OA\Property(property="city",type="string",description="minigolf city",example="Neuchâtel"),
     * @OA\Property(property="password",type="string",description="user password",example="test1234"),
     */
    use Notifiable;
    protected $table = 'users';
    protected $guarded = ['id',];

    protected $fillable = [
        'name', 'email', 'role', 'password', 'city',
    ];
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'update_at',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function games()
    {
        return $this->hasMany('App\Game');
    }

    public function players()
    {
        return $this->belongsToMany('App\Game','players','user_id', 'game_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
