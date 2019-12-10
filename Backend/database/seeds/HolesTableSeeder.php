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

        for ($i = 1; $i < 16; $i++) {
            for($j = 1; $j < 19; $j++){
                Hole::create([
                    'course_id' => $i,
                    'number' => $j,
                ]);
            }
        }
    }
}
