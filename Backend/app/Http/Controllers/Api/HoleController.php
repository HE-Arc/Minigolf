<?php

namespace App\Http\Controllers\Api;

use App\Hole;
use App\Http\Resources\HolestatResource;
use Illuminate\Http\Request;

class HoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['index', 'show']);
    }

    /**
     * @OA\Get(
     *     path="/holes",
     *     tags={"Holes"},
     *     summary="List holes",
     *     @OA\Response(
     *          response=200,
     *          description="List of holes",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Hole"))
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function index()
    {
        return HolestatResource::collection(Hole::with('scores.player', 'hole')
            ->get())
            ->jsonSerialize();
    }

    /**
     * @OA\Get(
     *     path="/holes/{id}",
     *     tags={"Holes"},
     *     summary="Show a hole",
     *     @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="Id hole",
     *          ),
     *     @OA\Response(
     *          response=200,
     *          description="A hole",
     *          @OA\JsonContent(ref="#/components/schemas/Hole")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function show($hole)
    {
        return HolestatResource::collection(Hole::with('scores.player', 'course')
            ->where('id', $hole)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * @OA\Post(
     *     path="/holes",
     *     tags={"Holes"},
     *     summary="Create new hole",
     *      @OA\RequestBody(
     *          request="Hole",
     *          @OA\JsonContent(ref="#/components/schemas/Hole"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="A newly-created hole",
     *          @OA\JsonContent(ref="#/components/schemas/Hole")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function store(Request $request)
    {
        $hole = Hole::create($request->all());
        return response()->json($hole, 201);
    }

    /**
     * @OA\Patch(
     *     path="/holes/{id}",
     *     tags={"Holes"},
     *     summary="Update hole",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id hole",
     *      ),
     *      @OA\RequestBody(
     *          request="Hole",
     *          @OA\JsonContent(ref="#/components/schemas/Hole"),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="List of holes",
     *          @OA\JsonContent(ref="#/components/schemas/Hole")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function update(Request $request, Hole $hole)
    {
        $hole->update($request->all());

        return $hole;
    }

    /**
     * @OA\Delete(
     *     path="/holes/{id}",
     *     tags={"Holes"},
     *     summary="Delete hole",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id hole",
     *       ),
     *     @OA\Response(
     *          response=204,
     *          description="delete a hole",
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function destroy(Hole $hole)
    {
        $hole->delete();

        return response()->json(null, 204);
    }
}
