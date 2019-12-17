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
        $courses = Course::with('holes')
            ->where('courses.id', $game->course_id)
            ->get()[0];
        foreach ($game->players as $player) {
            foreach ($courses->holes as $hole){
                factory(Score::class)->create([
                    'hole_id' => $hole->id,
                    'player_id' => $player->id
                ]);
            }
        }

    }
}
