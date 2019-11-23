<?php

use Illuminate\Database\Seeder;
use App\Game;

class GamesTableSeeder extends Seeder
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
            Game::create([
                'user_id' => $faker->numberBetween(1,12),
            ]);
        }
    }
}
