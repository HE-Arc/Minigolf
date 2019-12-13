<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 30; $i++) {
            Course::create([
                'minigolf_id' => $faker->numberBetween(1, 16),
                'name' => $faker->firstNameFemale,
            ]);
        }
    }
}
