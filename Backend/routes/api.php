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
Route::resource('users', 'UserController');
Route::resource('courses', 'CourseController');
Route::resource('minigolfs', 'MinigolfController');
Route::resource('games', 'GameController');
Route::resource('holes', 'HoleController');
//Route::resource('players', 'PlayerController');
Route::resource('scores', 'ScoreController');


// Auth/token
Route::prefix('auth')->group(function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
});

