<?php

use Illuminate\Database\Seeder;
use \App\Score;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < 541; $i++) {
            for ($j = 1; $j < 19; $j++) {
                Score::create([
                    'player_id' => $i,
                    'hole_id' => $j,
                    'score' => $faker->numberBetween(1,12),
                ]);
            }
        }
    }
}
