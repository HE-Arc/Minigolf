<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Player::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player = Player::create($request->all());
        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player $party
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return $player;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Player $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->update($request->all());

        return $player;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json(null, 204);
    }
}
