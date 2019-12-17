<?php

use Illuminate\Database\Seeder;
use App\Player;
use App\User;
use App\Game;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all('id')->pluck('id')->toArray();
        $games = Game::all('id', 'user_id');
        foreach ($games as $game) {
            $this->createPlayersForGamesUser($user_ids, $game);
        }
    }

    private function createPlayersForGamesUser($user_ids, $game)
    {
        $idExclude = array($game->user_id);
        factory(Player::class)->create([
            'user_id' => $game->user_id,
            'game_id' => $game->id
        ]);

        foreach (range(1, random_int(0, 7)) as $i) {
            $randId = $this->uniqueRandom(2, count($user_ids), $idExclude);
            array_push($idExclude, $randId);

            factory(Player::class)->create([
                'user_id' => $user_ids[$randId-1],
                'game_id' => $game->id
            ]);
        }
    }

    private function uniqueRandom($min, $max, $exclude)
    {
        do {
            $randId = random_int($min, $max);
        } while (in_array($randId, $exclude));
        return $randId;
    }
}
