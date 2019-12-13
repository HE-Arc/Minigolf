<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minigolf extends Model
{
    protected $table = 'minigolfs';
    protected $guarded = ['id'];
    protected $hidden =  ['created_at', 'updated_at'];
    protected $fillable = [
        'name', 'description', 'address', 'city', 'zipcode', 'phone', 'email', 'long', 'lat', 'image',
    ];

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function save(array $options = array())
    {
        $faker = \Faker\Factory::create();
        if (empty($this->id)) {
            $this->long = "6.{$faker->numberBetween(989102, 999679)}";
            $this->lat = "46.{$faker->numberBetween(856612, 953316)}";
            $this->image = "https://picsum.photos/id/{$faker->numberBetween(100,1080)}/800/600";
        }
        return parent::save($options);
    }
}
