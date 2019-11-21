<?php

use Illuminate\Database\Seeder;
use App\Hole;

class HolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 180; $i++) {
            Hole::create([
                'course_id' => $faker->numberBetween(1,20),
                'number' => $faker->name,
            ]);
        }
    }
}
