<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(type="object")
 */
class Minigolf extends Model
{
    /**
     * @OA\Property(property="name",type="string",description="minigolf name",example="Minigolf World"),
     * @OA\Property(property="description",type="string",description="minigolf description",example="This minigolf is awesome!"),
     * @OA\Property(property="address",type="string",description="minigolf address",example="Rue du Tertre 10"),
     * @OA\Property(property="city",type="string",description="minigolf city",example="Neuchâtel"),
     * @OA\Property(property="zipcode",type="string",description="minigolf zipcode",example="2000"),
     * @OA\Property(property="phone",type="string",description="minigolf phone",example="0793214392"),
     * @OA\Property(property="email",type="string",description="minigolf email",example="minigolf.world@gmail.com"),
     * @OA\Property(property="long",type="number",description="minigolf longitude",example="6.930877"),
     * @OA\Property(property="lat",type="number",description="minigolf latitude",example="46.994679"),
     * @OA\Property(property="image",type="string",description="Url image",example="https://valley.jpg"),
     */
    protected $table = 'minigolfs';
    protected $guarded = ['id',];
    protected $hidden =  ['created_at', 'updated_at',];
    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'zipcode',
        'phone',
        'email',
        'long',
        'lat',
        'image',
    ];

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function save(array $options = array())
    {
        $faker = \Faker\Factory::create();
        if (empty($this->id)) {
            $this->image = "https://picsum.photos/id/{$faker->numberBetween(100,1080)}/800/600";
        }
        return parent::save($options);
    }
}
