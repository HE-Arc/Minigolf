<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MinigolfResource;
use App\Minigolf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MinigolfController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['index', 'show']);
    }

    /**
     * @OA\Get(
     *     path="/minigolfs",
     *     tags={"Minigolfs"},
     *     summary="List minigolfs",
     *     @OA\Response(
     *          response=200,
     *          description="List of minigolfs",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Minigolf"))
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function index()
    {
        return MinigolfResource::collection(Minigolf::with('courses')
            ->get())
            ->jsonSerialize();
    }

    /**
     * @OA\Get(
     *     path="/minigolfs/{id}",
     *     tags={"Minigolfs"},
     *     summary="Show a minigolf",
     *     @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="Id minigolf",
     *          ),
     *     @OA\Response(
     *          response=200,
     *          description="A minigolf",
     *          @OA\JsonContent(ref="#/components/schemas/Minigolf")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function show(Minigolf $minigolf)
    {
        return MinigolfResource::collection(Minigolf::with('courses')
            ->where('id', '=', $minigolf->id)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * @OA\Post(
     *     path="/minigolfs",
     *     tags={"Minigolfs"},
     *     summary="Create new minigolf",
     *      @OA\RequestBody(
     *          request="Minigolf",
     *          @OA\JsonContent(ref="#/components/schemas/Minigolf"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="A newly-created minigolf",
     *          @OA\JsonContent(ref="#/components/schemas/Minigolf")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function store(Request $request)
    {
        $minigolf = Minigolf::create($request->all());
        $minigolf = MinigolfResource::collection(Minigolf::with('courses')
            ->where('id', '=', $minigolf->id)
            ->get())
            ->jsonSerialize()[0];
        return response()->json($minigolf, 201);
    }


    /**
     * @OA\Patch(
     *     path="/minigolfs/{id}",
     *     tags={"Minigolfs"},
     *     summary="Update minigolf",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id minigolf",
     *      ),
     *      @OA\RequestBody(
     *          request="Minigolf",
     *          @OA\JsonContent(ref="#/components/schemas/Minigolf"),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="List of minigolfs",
     *          @OA\JsonContent(ref="#/components/schemas/Minigolf")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
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
     * @OA\Delete(
     *     path="/minigolfs/{id}",
     *     tags={"Minigolfs"},
     *     summary="Delete minigolf",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id minigolf",
     *       ),
     *     @OA\Response(
     *          response=204,
     *          description="delete a minigolf",
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function destroy(Minigolf $minigolf)
    {
        $minigolf->delete();

        return response()->json(null, 204);
    }
}
