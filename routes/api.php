<?php

/*
|--------------------------------------------------------------------------
| Un-authenticated Routes
|--------------------------------------------------------------------------
|
| All these routes can accessed by app even before user is registered.
| Some are required for loading App.
|
*/

Route::group(['namespace' => 'App\\Http\\Controllers\Api\\'], function() {

    /*
     * Register new user
     *
     * This route may not be used anymore and will be removed soon. Its because we are handling
     * everything as a business option and we have created specific route to handle user registration
     * through BusinessOptionController that will ultimately call the AuthController. This is to ensure
     * uniformity in accessing API and getting Response.
     */
    Route::post('/user/register', [
        'as' => 'api.user.register',
        'uses' => 'AuthController@register'
    ]);

    /* Check if user email is valid or not */
    Route::post('/user/check-if-exists', [
        'as' => 'api.user.check-if-exists',
        'uses' => 'AuthController@checkIfUserExists'
    ]);

    /* Log in */
    Route::post('/user/login', [
        'as' => 'api.user.login',
        'uses' => 'AuthController@login'
    ]);

    /* Get Business Categories */
    Route::apiResource('business-categories', 'BusinessCategoryController');

    //gets the current status of current user's business.
    Route::get('/user/business-status', [
        'as' => 'api.user.business-status',
        'uses' => 'AuthController@getBusinessStatus'
    ]);

    /* specific business-option routes that sets up user and user business also need to be excluded from authentication */
    Route::get('/level/getting-started/section/business-category', 'BusinessOptionController@getBusinessCategoryBusinessOption');
    Route::get('/level/getting-started/section/sell-goods', 'BusinessOptionController@getSellGoodsBusinessOption');
    Route::get('/level/getting-started/section/about-you', 'BusinessOptionController@getAboutYouBusinessOption');
    /*
     * This route will be used by unauthenticated user to register themselves and save the basic business info.
     * While registering user through this route, business-category and sell-goods business options will be saved as well.
     * Once user registers, every business options will follow the default authenticated routed listed in the authenticated
     * routes section.
     */
    Route::post('/level/getting-started/section/about-you', 'BusinessOptionController@saveEntryBusinessOption');
});



/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
|
| User must be logged in to access these routes.
| The request header should include valid Authorization Bearer JWT token to access these routes.
|
*/

Route::group(['namespace' => 'App\\Http\\Controllers\Api\\', 'middleware' => ['jwt.auth']], function() {
    /*
     * User Routes
     */
    Route::put('/user/{user}', [
        'as' => 'api.user.update',
        'uses' => 'AuthController@update'
    ]);

    Route::post('/user/logout', [
        'as' => 'api.logout',
        'uses' => 'AuthController@logout'
    ]);

    /*
     * Business Options routes
     */

//    Route::apiResource('businesses', 'BusinessController');
//    Route::apiResource('levels', 'LevelController');
//    Route::apiResource('levels/{level}/sections', 'SectionController');

    /* This route will return the first business-option of the specified level/section */
    Route::get('/level/{level}/section/{section}', 'BusinessOptionController@first');

    /* This route will return all the business-options within level/section */
    Route::get('/level/{level}/section/{section}/business-options', 'BusinessOptionController@index');

    /* This route will return the specified business-option */
    Route::get('/level/{level}/section/{section}/business-option/{business_option}', [
        'as' => 'api.business-option.show',
        'uses' => 'BusinessOptionController@show'
    ]);

    Route::get('/level/{level}/section/{section}/business-option/{business_option}/next', [
        'as' => 'api.business-option.next',
        'uses' => 'BusinessOptionController@next'
    ]);

    /* This is the default route to save any business option */
    Route::post('/business-option', 'BusinessOptionController@save');

    /* This is the default route to update any business option */
    Route::put('/business-option', 'BusinessOptionController@update');

});

