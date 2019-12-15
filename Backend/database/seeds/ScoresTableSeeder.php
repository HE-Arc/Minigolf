<?php

use Illuminate\Database\Seeder;
use \App\Score;
use \App\Course;
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
        $games = Game::with('players')->get();
        foreach ($games as $game) {
            $this->createScoreForHolePlayer($game);
        }
    }

    private function createScoreForHolePlayer($game)
    {
        $holes = Course::with('holes')
            ->where('id', "=", $game->course_id)
            ->get();

        foreach ($game->players as $player) {
            foreach ($holes as $hole){
                factory(Score::class)->create([
                    'hole_id' => $hole->id,
                    'player_id' => $player->id
                ]);
            }
        }

    }
}
