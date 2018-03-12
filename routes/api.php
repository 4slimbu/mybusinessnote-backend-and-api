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

Route::group(['namespace' => 'App\\Http\\Controllers\Api\\'], function () {

    /*
     * User
     */
    Route::post('/user/register', [
        'as'   => 'api.user.register',
        'uses' => 'ApiAuthController@register',
    ]);

    Route::post('/user/check-if-exists', [
        'as'   => 'api.user.check-if-exists',
        'uses' => 'ApiAuthController@checkIfUserExists',
    ]);

    Route::post('/user/login', [
        'as'   => 'api.user.login',
        'uses' => 'ApiAuthController@login',
    ]);

    Route::get('/user/send-verification-email', [
        'as'   => 'api.send-verification-email',
        'uses' => 'ApiAuthController@sendVerificationEmail',
    ]);

    Route::post('/user/verify-email', [
        'as'   => 'api.verify-email',
        'uses' => 'ApiAuthController@verifyEmail',
    ]);

    Route::post('/user/send-forgot-password-email', [
        'as'   => 'api.send-forgot-password-email',
        'uses' => 'ApiAuthController@sendForgotPasswordEmail',
    ]);

    Route::post('/user/update-password', [
        'as'   => 'api.update-password',
        'uses' => 'ApiAuthController@updatePassword',
    ]);

    /*
     * Social Auth
     */
    Route::get('/login/oauth/{driver}', 'SocialAuthController@redirectToProvider')->name('social.oauth');
    Route::get('/login/oauth/{driver}/callback', 'SocialAuthController@handleProviderCallback')->name('social.callback');

    /*
     * Levels
     */
    Route::apiResource('levels', 'LevelController');

    /*
     * Business Categories
     */
    Route::apiResource('business-categories', 'BusinessCategoryController');

    /*
     * Track user click on partner's link
     */
    Route::get('/click', 'AffiliateLinkTrackerController@trackClick');
});


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
|
| The request header should include valid Authorization Bearer JWT token to access these routes.
|
*/

Route::group(['namespace' => 'App\\Http\\Controllers\Api\\', 'middleware' => ['jwt.auth']], function () {
    /*
     * User
     */
    Route::get('/user', [
        'as'   => 'api.user',
        'uses' => 'ApiAuthController@getUser',
    ]);

    Route::put('/user', [
        'as'   => 'api.user.update',
        'uses' => 'ApiAuthController@update',
    ]);

    Route::post('/user/logout', [
        'as'   => 'api.logout',
        'uses' => 'ApiAuthController@logout',
    ]);

    /*
     * User Business
     */
    Route::get('/user/business', [
        'as'   => 'api.user.business',
        'uses' => 'BusinessController@getUserBusiness',
    ]);

    Route::get('/user/business/status', [
        'as'   => 'api.user.business.status',
        'uses' => 'BusinessController@getUserBusinessStatus',
    ]);

    Route::put('/user/business', [
        'as'   => 'api.user.business.save',
        'uses' => 'BusinessController@saveUserBusiness',
    ]);

    /*
     * Business Option
     */
    Route::get('/business-options', [
        'as'   => 'api.business-options',
        'uses' => 'BusinessOptionController@index',
    ]);

    Route::get('/business-option/{business_option}', [
        'as'   => 'api.business-option.show',
        'uses' => 'BusinessOptionController@show',
    ]);

    Route::post('/business-option/{business_option}', [
        'as'   => 'api.business-option.save',
        'uses' => 'BusinessOptionController@save',
    ]);

});

