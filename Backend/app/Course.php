<?php

namespace App;

use App\Http\Resources\HoleCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object")
 */
class Course extends Model
{
    /**
     * @OA\Property(property="minigolf_id",type="integer",format="associated minigolf",description="id minigolf",example="1"),
     * @OA\Property(property="name",type="string",description="Course name",example="Lava course"),
     * @OA\Property(property="description",type="string",description="Course description",example="This course is great"),
     * @OA\Property(property="image",type="string",description="Url image",example="https://valley.jpg"),
     */
    protected $table = 'courses';
    protected $guarded = ['id',];
    protected $fillable = ['minigolf_id', 'name', 'description', 'image',];
    protected $hidden = ['created_at', 'updated_at',];

    public function minigolf()
    {
        return $this->belongsTo('App\Minigolf');
    }

    public function holes()
    {
        return $this->hasMany('App\Hole');
    }

    public function save(array $options = array())
    {
        $faker = \Faker\Factory::create();
        if (empty($this->id)) {
            $this->image = "https://picsum.photos/id/{$faker->numberBetween(100,1080)}/400/300";
        }
        return parent::save($options);
    }
}
