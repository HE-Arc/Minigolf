<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minigolf extends Model
{
    protected $table = 'minigolfs';

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    protected $fillable = [
        'name', 'description', 'address', 'city', 'zipcode', 'phone', 'email', 'long', 'lat', 'image',
    ];

    public function save(array $options = array())
    {
        $faker = \Faker\Factory::create();
        if(empty($this->id)) {
            $this->long = "46.{$faker->numberBetween(953316,856612)}";
            $this->lat = "6.{$faker->numberBetween(997679,991582)}";
            $this->image = "https://picsum.photos/id/{$faker->numberBetween(100,1080)}/800/600";
        }
        return parent::save($options);
    }
}
