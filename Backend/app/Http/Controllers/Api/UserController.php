<?php

namespace App\Http\Controllers\Api;


use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.verify')->except(['show', 'index']);
    }

    /**
     * @OA\Get(
     *     path="/users",
     *     tags={"Users"},
     *     summary="List users",
     *     @OA\Response(
     *          response=200,
     *          description="List of users",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function index()
    {
        return UserResource::collection(User::with('players')
            ->with('games')
            ->get())
            ->jsonSerialize();
    }

    /**
     * @OA\Get(
     *     path="/users/{id}",
     *     tags={"Users"},
     *     summary="Show a user",
     *     @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="Id user",
     *          ),
     *     @OA\Response(
     *          response=200,
     *          description="A user",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function show(User $user)
    {
        return UserResource::collection(User::with('players')->with('games')
            ->where('id', '=', $user->id)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * @OA\Post(
     *     path="/users",
     *     tags={"Users"},
     *     summary="Create new user",
     *      @OA\RequestBody(
     *          request="User",
     *          @OA\JsonContent(ref="#/components/schemas/User"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="A newly-created user",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    /**
     * @OA\Patch(
     *     path="/users/{id}",
     *     tags={"Users"},
     *     summary="Update user",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id user",
     *      ),
     *      @OA\RequestBody(
     *          request="User",
     *          @OA\JsonContent(ref="#/components/schemas/User"),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="List of users",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

    /**
     * @OA\Delete(
     *     path="/users/{id}",
     *     tags={"Users"},
     *     summary="Delete user",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id user",
     *       ),
     *     @OA\Response(
     *          response=204,
     *          description="delete a user",
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
