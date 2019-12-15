<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScoregameResource;
use Illuminate\Http\Request;
use App\Game;

class ScoreGameController extends Controller
{
    public function index()
    {
        return ScoregameResource::collection(Game::with('players.scores.hole')
                ->get())
                ->jsonSerialize();
    }

    public function show($id)
    {
        return ScoregameResource::collection(Game::with('players.scores.hole')
                ->where('games.id', $id)
                ->get())
                ->jsonSerialize()[0];
    }
}
