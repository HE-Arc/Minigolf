<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Controller;
use App\Minigolf;
use Illuminate\Http\Request;

class MinigolfsController extends Controller
{

    public function index()
    {
        return Minigolf::with('courses')
                            ->get()
                            ->jsonSerialize();
    }
    public function show($id)
        {
            return Minigolf::with('courses')
                    ->where('id', $id)
                    ->get()
                    ->jsonSerialize()[0];
        }
}
