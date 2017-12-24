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

//Authentication
Route::post('/user/register', [
    'as' => 'api.user.register',
    'uses' => 'App\Http\Controllers\Api\AuthController@register'
]);

Route::post('/user/{user}.', [
    'as' => 'api.user.update',
    'uses' => 'App\Http\Controllers\Api\AuthController@update'
]);

Route::post('/login', [
    'as' => 'api.login',
    'uses' => 'App\Http\Controllers\Api\AuthController@login'
]);


/**
 * Level Routes
 */

/* Levels */
Route::apiResource('business-categories', 'App\Http\Controllers\Api\BusinessCategoryController');
Route::apiResource('businesses', 'App\Http\Controllers\Api\BusinessController');
Route::apiResource('levels', 'App\Http\Controllers\Api\LevelController');
Route::apiResource('levels/{level}/sections', 'App\Http\Controllers\Api\SectionController');
Route::apiResource('levels/{level}/sections/{section}/business-options', 'App\Http\Controllers\Api\BusinessOptionController');

Route::group(['middleware' => ['jwt.auth']], function() {
    /**
     * User logout route is also protected route
     */
    Route::post('/user/logout', [
        'as' => 'api.logout',
        'uses' => 'App\Http\Controllers\Api\AuthController@logout'
    ]);

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


});

