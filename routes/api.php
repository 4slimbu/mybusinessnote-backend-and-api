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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Page Routes
 */

Route::get('/start', [
    'as' => 'start',
    'uses' => 'App\Http\Controllers\Api\PageController@home'
]);
Route::get('/start/level/{level}', [
    'as' => 'start.level',
    'uses' => 'App\Http\Controllers\Api\PageController@level'
]);
Route::get('/start/{level}/section/{section}', [
    'as' => 'start.level.section',
    'uses' => 'App\Http\Controllers\Api\PageController@section'
]);
Route::get('/start/{level}/section/{section}/{businessOption}', [
    'as' => 'start.level.section.business-option',
    'uses' => 'App\Http\Controllers\Api\PageController@businessOption'
]);

/**
 * Level Routes
 */

/* Level */
Route::get('level/all', [
    'as' => 'level.all',
    'uses' => 'App\Http\Controllers\Api\LevelController@index',
]);