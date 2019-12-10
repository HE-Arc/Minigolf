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

        for ($i = 1; $i < 16; $i++) {
            Course::create([
                'minigolf_id' => $i,
                'name' => $faker->firstNameFemale,
            ]);
        }
    }
}
