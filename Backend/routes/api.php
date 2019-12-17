<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
$except = ['create','edit'];

// JWT
Route::prefix('users')->group(function () {
    Route::get('profile', 'Api\AuthController@profile');
});

Route::prefix('auth')->group(function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
});

Route::resource('games-scores', 'Api\ScoreGameController',['only' => [
    'index', 'show'
]]);

Route::resource('users', 'Api\UserController',['except' => $except]);
Route::resource('courses', 'Api\CourseController',['except' => $except]);
Route::resource('minigolfs', 'Api\MinigolfController',['except' => $except]);
Route::resource('games', 'Api\GameController',['except' => $except]);
Route::resource('holes', 'Api\HoleController',['except' => $except]);
//Route::resource('players', 'Api\PlayerController',['except' => $except]);
Route::resource('scores', 'Api\ScoreController',['except' => $except]);





