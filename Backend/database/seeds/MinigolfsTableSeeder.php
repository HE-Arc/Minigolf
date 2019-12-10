<?php

use Illuminate\Database\Seeder;
use App\Minigolf;

class MinigolfsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 15; $i++) {
            Minigolf::create([
                'name' => $faker->company,
                'description' => $faker->text,
                'city' => $faker->city,
                'address' => $faker->address,
                'zipcode' => $faker->numberBetween(1500,3000),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'image' => "https://picsum.photos/id/{$faker->numberBetween(100,1080)}/800/600",

            ]);
        }
    }
}
