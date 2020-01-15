<?php

namespace App\Http\Controllers\Api;

use App\Game;
use App\Http\Resources\GameResource;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['index', 'show']);
    }

    /**
     * @OA\Get(
     *     path="/games",
     *     tags={"Games"},
     *     summary="List games",
     *     @OA\Response(
     *          response=200,
     *          description="List of games",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Game"))
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function index()
    {
        return GameResource::collection(Game::with('users', 'players')
            ->get())
            ->jsonSerialize();
    }


    /**
     * @OA\Get(
     *     path="/games/{id}",
     *     tags={"Games"},
     *     summary="Show a game",
     *     @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="Id game",
     *          ),
     *     @OA\Response(
     *          response=200,
     *          description="A game",
     *          @OA\JsonContent(ref="#/components/schemas/Game")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function show(Game $game)
    {
        return GameResource::collection(Game::with('players')
            ->where('id', $game->id)
            ->get())
            ->jsonSerialize();
    }

    /**
     * @OA\Post(
     *     path="/games",
     *     tags={"Games"},
     *     summary="Create new game",
     *      @OA\RequestBody(
     *          request="Game",
     *          @OA\JsonContent(ref="#/components/schemas/Game"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="A newly-created game",
     *          @OA\JsonContent(ref="#/components/schemas/Game")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function store(Request $request)
    {
        $game = Game::create($request->all());
        return response()->json($game, 201);
    }

    /**
     * @OA\Patch(
     *     path="/games/{id}",
     *     tags={"Games"},
     *     summary="Update game",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id game",
     *      ),
     *      @OA\RequestBody(
     *          request="Game",
     *          @OA\JsonContent(ref="#/components/schemas/Game"),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="List of games",
     *          @OA\JsonContent(ref="#/components/schemas/Game")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function update(Request $request, Game $game)
    {
        $game->update($request->all());
        return $game;
    }

    /**
     * @OA\Delete(
     *     path="/games/{id}",
     *     tags={"Games"},
     *     summary="Delete game",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id game",
     *       ),
     *     @OA\Response(
     *          response=204,
     *          description="delete a game",
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return response()->json(null, 204);
    }
}
