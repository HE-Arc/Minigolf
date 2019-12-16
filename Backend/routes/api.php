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
Route::prefix('users')->group(function () {
    Route::get('profile', 'Api\AuthController@profile');
});

//Route::group(['middleware' => 'jwt.verify'], function () {
//
//});

Route::get('games-scores', 'Api\ScoreGameController@index');
Route::get('games-scores/{id}', 'Api\ScoreGameController@show');
Route::resource('users', 'Api\UserController');
Route::resource('courses', 'Api\CourseController');
Route::resource('minigolfs', 'Api\MinigolfController');
Route::resource('games', 'Api\GameController');
Route::resource('holes', 'Api\HoleController');
//Route::resource('players', 'PlayerController');
Route::resource('scores', 'Api\ScoreController');


// Auth/token
Route::prefix('auth')->group(function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
});

