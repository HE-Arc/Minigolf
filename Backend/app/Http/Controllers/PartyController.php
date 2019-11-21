<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Party::all();
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
        $party = Party::create($request->all());
        return response()->json($party, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Party $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        return $party;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Party $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Party $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        $party->update($request->all());

        return $party;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Party $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        $party->delete();

        return response()->json(null, 204);
    }
}