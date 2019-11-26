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

Route::resource('users', 'UserController');
Route::resource('courses', 'CourseController');
Route::resource('minigolfs', 'MinigolfController');
Route::resource('games', 'GameController');
Route::resource('holes', 'HoleController');
Route::resource('players', 'PlayerController');
Route::resource('scores', 'ScoreController');

//Api Auth
//Auth::guard('api')->user(); // instance of the logged user
//Auth::guard('api')->check(); // if a user is authenticated
//Auth::guard('api')->id(); // the id of the authenticated user

// Auth/token
Route::prefix('auth')->group(function(){
 Route::post('login', 'Api\AuthController@login');
 Route::post('register', 'Api\AuthController@register');
 Route::group(['middleware' => 'auth:api'], function(){
 Route::post('getUser', 'Api\AuthController@getUser');
 });
});
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout');
