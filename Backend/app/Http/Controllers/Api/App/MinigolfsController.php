<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\App\MinigolfResource;
use App\Minigolf;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class MinigolfsController extends Controller
{

    public function index()
    {
        return MinigolfResource::collection(Minigolf::with('courses.holes')
                            ->get())
                            ->jsonSerialize();
    }
    public function show($id)
        {
            return MinigolfResource::collection(Minigolf::with('courses.holes')
                    ->where('id', $id)
                    ->get())
                    ->jsonSerialize()[0];
        }
}
