<?php

namespace App\Http\Controllers\Api\App;

use App\Course;
use App\Hole;
use App\Http\Resources\App\CourseHolesResource;
use App\Http\Resources\App\UserResource;
use App\Http\Resources\App\GameResource;
use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Score;
use App\Player;
use PhpParser\Node\Stmt\Return_;

class GamesController extends Controller
{
    public function show($id)
    {
        return UserResource::collection(User::with('gamesplayed.players.scores.hole', 'gamesplayed.course.minigolf')
            ->where('id', $id)
            ->get())
            ->jsonSerialize()[0][0];
    }

    public function gameToken($token)
    {
        return GameResource::collection(Game::with('players.scores.hole', 'course.minigolf')
            ->where('token', $token)
            ->get())
            ->jsonSerialize()[0];
    }

    public function store(Request $request)
    {
        $course = Course::all(['id', 'name'])
            ->where('id', $request->course_id)->first();


        $game = factory(Game::class)->create([
            'user_id' => $request->user_id,
            'course_id' => $course->id
        ]);


        $player = factory(Player::class)->create([
            'user_id' => $request->user_id,
            'game_id' => $game->id
        ]);

        $holes = Hole::all(['id', 'course_id'])
            ->where('course_id', $course->id)
            ->flatten();


        foreach ($holes as $hole) {
            factory(Score::class)->create([
                'hole_id' => $hole->id,
                'player_id' => $player->id,
                'score' => 0
            ]);
        }

        return response()->json($this->gameToken($game->token), 201);
    }

    public function joinGame(Request $request)
    {
        $game = Game::all(['id', 'token', 'course_id'])
            ->where('token', $request->token)->first();


        $playerExist = Player::all(['id', 'game_id', 'user_id'])
            ->where('game_id', $game->id)
            ->where('user_id', $request->user_id)->first();

        if ($playerExist == null) {
            $player = factory(Player::class)->create([
                'user_id' => $request->user_id,
                'game_id' => $game->id
            ]);

            $holes = Hole::all(['id', 'course_id'])
                ->where('course_id', $game->course_id)->flatten();


            foreach ($holes as $hole) {
                factory(Score::class)->create([
                    'hole_id' => $hole->id,
                    'player_id' => $player->id,
                    'score' => 0,
                ]);
            }
        }


        return response()->json($this->gameToken($game->token), 201);
    }

    public function addScore($request)
    {
        $game = Game::all(['id', 'token'])
            ->where('token', $request->token);

        $player = factory(Player::class)->create([
            'user_id' => $request->user_id,
            'game_id' => $game->id
        ]);

        $holes = Hole::all(['id', 'course_id'])
            ->where('course_id', $game->id)
            ->toArray();

        foreach ($holes as $hole) {
            factory(Score::class)->create([
                'hole_id' => $hole->id,
                'player_id' => $player->id,
                'score' => 0,
            ]);
        }

        return response()->json($this->gameToken($game->token), 201);
    }
}
