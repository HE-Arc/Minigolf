<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Resources\App\UserResource;
use Illuminate\Http\Request;
use App\User;

class GamesController extends Controller
{
    public function show($id)
    {
//        return UserResource::collection(
//            User::with('games.players.scores.hole',
//            'games.course.minigolf',
//            'games.players.user',
//                'games.creator')
//                ->where('id', $id)
//                ->get())
//                ->jsonSerialize()[0];

        return UserResource::collection(User::with('gamesplayed.players.scores.hole','gamesplayed.course.minigolf')
//            ,'players.scores.hole',
//                'players.game.creator'
                ->where('id', $id)
                ->get())
                ->jsonSerialize()[0][0];
    }
}
