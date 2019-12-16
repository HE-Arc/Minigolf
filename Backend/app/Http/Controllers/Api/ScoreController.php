<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ScoreResource;
use App\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['index', 'show']);
    }

    /**
     * @OA\Get(
     *     path="/scores",
     *     tags={"Scores"},
     *     summary="List scores",
     *     @OA\Response(
     *          response=200,
     *          description="List of scores",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Score"))
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function index()
    {
        return ScoreResource::collection(Score::with('player')
            ->get())
            ->jsonSerialize();
    }

    /**
     * @OA\Get(
     *     path="/scores/{id}",
     *     tags={"Scores"},
     *     summary="Show a score",
     *     @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="Id score",
     *          ),
     *     @OA\Response(
     *          response=200,
     *          description="A score",
     *          @OA\JsonContent(ref="#/components/schemas/Score")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function show($gameId)
    {
        return ScoreResource::collection(Score::with('player')
            ->where('scores.id', $gameId)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * @OA\Post(
     *     path="/scores",
     *     tags={"Scores"},
     *     summary="Create new score",
     *      @OA\RequestBody(
     *          request="Score",
     *          @OA\JsonContent(ref="#/components/schemas/Score"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="A newly-created score",
     *          @OA\JsonContent(ref="#/components/schemas/Score")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function store(Request $request)
    {
        $score = Score::create($request->all());
        return response()->json($score, 201);
    }


    /**
     * @OA\Patch(
     *     path="/scores/{id}",
     *     tags={"Scores"},
     *     summary="Update score",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id score",
     *      ),
     *      @OA\RequestBody(
     *          request="Score",
     *          @OA\JsonContent(ref="#/components/schemas/Score"),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="List of scores",
     *          @OA\JsonContent(ref="#/components/schemas/Score")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function update(Request $request, Score $score)
    {
        $score->update($request->all());

        return $score;
    }

    /**
     * @OA\Delete(
     *     path="/scores/{id}",
     *     tags={"Scores"},
     *     summary="Delete score",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id score",
     *       ),
     *     @OA\Response(
     *          response=204,
     *          description="delete a score",
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function destroy(Score $score)
    {
        $score->delete();

        return response()->json(null, 204);
    }
}
