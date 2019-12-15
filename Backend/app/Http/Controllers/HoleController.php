<?php

namespace App\Http\Controllers;

use App\Hole;
use App\Http\Resources\HolestatResource;
use App\Score;
use Illuminate\Http\Request;

class HoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Hole::all();
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
        $hole = Hole::create($request->all());
        return response()->json($hole, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hole $party
     * @return \Illuminate\Http\Response
     */
    public function show($hole)
    {
        return HolestatResource::collection(Hole::with('scores','course')
            ->where('id', $hole)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hole $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Hole $hole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Hole $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hole $hole)
    {
        $hole->update($request->all());

        return $hole;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hole $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hole $hole)
    {
        $hole->delete();

        return response()->json(null, 204);
    }
}
