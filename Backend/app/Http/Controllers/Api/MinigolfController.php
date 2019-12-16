<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MinigolfResource;
use App\Minigolf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MinigolfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MinigolfResource::collection(Minigolf::with('courses')
            ->get())
            ->jsonSerialize();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        $minigolf = Minigolf::create($request->all());
        $minigolf = MinigolfResource::collection(Minigolf::with('courses')
            ->where('id', '=', $minigolf->id)
            ->get())
            ->jsonSerialize()[0];
        return response()->json($minigolf, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Minigolf $minigolf
     * @return \Illuminate\Http\Response
     */
    public function show(Minigolf $minigolf)
    {
        return MinigolfResource::collection(Minigolf::with('courses')
            ->where('id', '=', $minigolf->id)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Minigolf $minigolf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Minigolf $minigolf)
    {
        $minigolf->update($request->all());
        return MinigolfResource::collection(Minigolf::with('courses')
            ->where('id', '=', $minigolf->id)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Minigolf $minigolf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Minigolf $minigolf)
    {
        $minigolf->delete();

        return response()->json(null, 204);
    }
}
