<?php
/**
 * Created by PhpStorm.
 * User: nath
 * Date: 15.11.19
 * Time: 11:39
 */

namespace App\Http\Controllers;


use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
        {
//            $this->middleware('auth:api')->except('index');
//            $this->middleware('auth:api')->except(['index', 'delete', 'show']);
        }

        public function index()
        {
            return UserResource::collection(User::with('games')
                ->get())
                ->jsonSerialize();
        }

        public function show(User $user)
        {
            return UserResource::collection(User::with('games')
                ->where('id','=', $user->id)
                ->get())
                ->jsonSerialize();
        }

        public function store(Request $request)
        {
            $user = User::create($request->all());
            return response()->json($user, 201);
        }

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

        public function destroy($id) {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(null, 204);
        }
}
