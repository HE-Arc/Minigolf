<?php

use Illuminate\Database\Seeder;
use \App\Score;
use \App\Player;
use \App\Hole;
use \App\Game;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $player_ids = Player::all();
//        $course_ids = Course::with('holes')->get();
    }

    private function createScoreForHolePlayer($hole_id,$player_id)
    {
        factory(Score::class)->create([
            'hole_id' => $hole_id,
            'player_id' => $player_id
        ]);
    }
}
