<?php

namespace App\Http\Controllers;

use App\Minigolf;
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
        $minigolf = Minigolf::with('courses.holes')->get();
        return $minigolf;
        return Minigolf::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $minigolf = Minigolf::create($request->all());
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
        return $minigolf;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Minigolf $minigolf
     * @return \Illuminate\Http\Response
     */
    public function edit(Minigolf $minigolf)
    {
        //
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
        return $minigolf;
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
