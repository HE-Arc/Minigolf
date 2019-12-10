<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 181; $i++){
//            $numPlayer = $faker->numberBetween(1,10);
            for($j = 1; $j < 4; $j++) {
                Player::create([
                    'game_id' => $i,
                    'user_id' => $j,
                ]);
            }
        }
    }
}
