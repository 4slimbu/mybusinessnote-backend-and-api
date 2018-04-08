<?php

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Routes to authenticate backend users.
|
*/
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Auth::routes();
});

/*
|--------------------------------------------------------------------------
| Backend Base Dashboard Route
|--------------------------------------------------------------------------
|
| Routes for the backend base dashboard. It isn't connected to any view.
| It just redirect to appropriate dashboard depending upon the user role.
*/

Route::get('/', [
    'as'   => 'dashboard',
    'uses' => 'App\\Http\\Controllers\\DashboardController@index',
]);


/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes
|--------------------------------------------------------------------------
|
| Routes for all the admin related requests.
|
*/


Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => 'auth.admin',
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {

    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'DashboardController@index',
    ]);

    /* Business Category */
    Route::get('business-category', [
        'as'   => 'business-category',
        'uses' => 'BusinessCategoryController@index',
    ]);
    Route::get('business-category/create', [
        'as'   => 'business-category.create',
        'uses' => 'BusinessCategoryController@create',
    ]);
    Route::post('business-category/store', [
        'as'   => 'business-category.store',
        'uses' => 'BusinessCategoryController@store',
    ]);
    Route::get('business-category/edit/{businessCategory}', [
        'as'   => 'business-category.edit',
        'uses' => 'BusinessCategoryController@edit',
    ]);
    Route::post('business-category/update/{businessCategory}', [
        'as'   => 'business-category.update',
        'uses' => 'BusinessCategoryController@update',
    ]);
    Route::delete('business-category/destroy/{businessCategory}', [
        'as'   => 'business-category.destroy',
        'uses' => 'BusinessCategoryController@destroy',
    ]);


    /* User */
    Route::get('user', [
        'as'   => 'user',
        'uses' => 'UserController@index',
    ]);
    Route::get('user/create', [
        'as'   => 'user.create',
        'uses' => 'UserController@create',
    ]);
    Route::post('user/store', [
        'as'   => 'user.store',
        'uses' => 'UserController@store',
    ]);
    Route::get('user/edit/{user}', [
        'as'   => 'user.edit',
        'uses' => 'UserController@edit',
    ]);
    Route::post('user/update/{user}', [
        'as'   => 'user.update',
        'uses' => 'UserController@update',
    ]);
    Route::delete('user/destroy/{user}', [
        'as'   => 'user.destroy',
        'uses' => 'UserController@destroy',
    ]);


    /* Partner */
    Route::get('partner', [
        'as'   => 'partner',
        'uses' => 'PartnerController@index',
    ]);
    Route::get('partner/create', [
        'as'   => 'partner.create',
        'uses' => 'PartnerController@create',
    ]);
    Route::post('partner/store', [
        'as'   => 'partner.store',
        'uses' => 'PartnerController@store',
    ]);
    Route::get('partner/edit/{partner}', [
        'as'   => 'partner.edit',
        'uses' => 'PartnerController@edit',
    ]);
    Route::post('partner/update/{partner}', [
        'as'   => 'partner.update',
        'uses' => 'PartnerController@update',
    ]);
    Route::delete('partner/destroy/{partner}', [
        'as'   => 'partner.destroy',
        'uses' => 'PartnerController@destroy',
    ]);

    /* Customer */
    Route::get('customer', [
        'as'   => 'customer',
        'uses' => 'CustomerController@index',
    ]);
    Route::get('customer/create', [
        'as'   => 'customer.create',
        'uses' => 'CustomerController@create',
    ]);
    Route::post('customer/store', [
        'as'   => 'customer.store',
        'uses' => 'CustomerController@store',
    ]);
    Route::get('customer/edit/{customer}', [
        'as'   => 'customer.edit',
        'uses' => 'CustomerController@edit',
    ]);
    Route::post('customer/update/{customer}', [
        'as'   => 'customer.update',
        'uses' => 'CustomerController@update',
    ]);
    Route::delete('customer/destroy/{customer}', [
        'as'   => 'customer.destroy',
        'uses' => 'CustomerController@destroy',
    ]);

    /* Business */
    Route::get('business', [
        'as'   => 'business',
        'uses' => 'BusinessController@index',
    ]);
    Route::get('business/create', [
        'as'   => 'business.create',
        'uses' => 'BusinessController@create',
    ]);
    Route::post('business/store', [
        'as'   => 'business.store',
        'uses' => 'BusinessController@store',
    ]);
    Route::get('business/edit/{business}', [
        'as'   => 'business.edit',
        'uses' => 'BusinessController@edit',
    ]);
    Route::post('business/update/{business}', [
        'as'   => 'business.update',
        'uses' => 'BusinessController@update',
    ]);
    Route::delete('business/destroy/{business}', [
        'as'   => 'business.destroy',
        'uses' => 'BusinessController@destroy',
    ]);

    /* Business Option */
    Route::get('business-option', [
        'as'   => 'business-option',
        'uses' => 'BusinessOptionController@index',
    ]);
    Route::get('business-option/create', [
        'as'   => 'business-option.create',
        'uses' => 'BusinessOptionController@create',
    ]);
    Route::post('business-option/store', [
        'as'   => 'business-option.store',
        'uses' => 'BusinessOptionController@store',
    ]);
    Route::get('business-option/edit/{businessOption}', [
        'as'   => 'business-option.edit',
        'uses' => 'BusinessOptionController@edit',
    ]);
    Route::post('business-option/update/{businessOption}', [
        'as'   => 'business-option.update',
        'uses' => 'BusinessOptionController@update',
    ]);
    Route::delete('business-option/destroy/{businessOption}', [
        'as'   => 'business-option.destroy',
        'uses' => 'BusinessOptionController@destroy',
    ]);
    Route::get('business-option/move-up/{businessOption}', [
        'as'   => 'business-option.move-up',
        'uses' => 'BusinessOptionController@moveUp',
    ]);
    Route::get('business-option/move-down/{businessOption}', [
        'as'   => 'business-option.move-down',
        'uses' => 'BusinessOptionController@movedown',
    ]);

    /* Level */
    Route::get('level', [
        'as'   => 'level',
        'uses' => 'LevelController@index',
    ]);
    Route::get('level/create', [
        'as'   => 'level.create',
        'uses' => 'LevelController@create',
    ]);
    Route::post('level/store', [
        'as'   => 'level.store',
        'uses' => 'LevelController@store',
    ]);
    Route::get('level/edit/{level}', [
        'as'   => 'level.edit',
        'uses' => 'LevelController@edit',
    ]);
    Route::post('level/update/{level}', [
        'as'   => 'level.update',
        'uses' => 'LevelController@update',
    ]);
    Route::delete('level/destroy/{level}', [
        'as'   => 'level.destroy',
        'uses' => 'LevelController@destroy',
    ]);

    /* Section */
    Route::get('section', [
        'as'   => 'section',
        'uses' => 'SectionController@index',
    ]);
    Route::get('section/create', [
        'as'   => 'section.create',
        'uses' => 'SectionController@create',
    ]);
    Route::post('section/store', [
        'as'   => 'section.store',
        'uses' => 'SectionController@store',
    ]);
    Route::get('section/edit/{section}', [
        'as'   => 'section.edit',
        'uses' => 'SectionController@edit',
    ]);
    Route::post('section/update/{section}', [
        'as'   => 'section.update',
        'uses' => 'SectionController@update',
    ]);
    Route::delete('section/destroy/{section}', [
        'as'   => 'section.destroy',
        'uses' => 'SectionController@destroy',
    ]);

});


/*
|--------------------------------------------------------------------------
| Partner Dashboard Routes
|--------------------------------------------------------------------------
|
| Routes for all the partner related requests.
|
*/


Route::group([
    'prefix'     => 'partner-dashboard',
    'as'         => 'partner-dashboard.',
    'middleware' => 'auth.partner',
    'namespace'  => 'App\\Http\\Controllers\\PartnerDashboard',
], function () {

    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'DashboardController@index',
    ]);

    /* Profile */
    Route::get('profile', [
        'as'   => 'profile',
        'uses' => 'ProfileController@index',
    ]);
    Route::post('profile/update/password', [
        'as'   => 'profile.update-password',
        'uses' => 'ProfileController@updatePassword',
    ]);
    Route::post('profile/update', [
        'as'   => 'profile.update',
        'uses' => 'ProfileController@update',
    ]);
    Route::get('profile/edit/password', [
        'as'   => 'profile.edit-password',
        'uses' => 'ProfileController@editPassword',
    ]);

    /* Lead */
    Route::get('lead', [
        'as'   => 'lead',
        'uses' => 'LeadController@index',
    ]);

    Route::get('lead/download', [
        'as'   => 'lead.download',
        'uses' => 'LeadController@download',
    ]);
});


/*
|--------------------------------------------------------------------------
| User Dashboard Routes
|--------------------------------------------------------------------------
|
| Routes for all the user related request.
|
*/


Route::group([
    'prefix'     => 'user-dashboard',
    'as'         => 'user-dashboard.',
    'middleware' => 'auth.user',
    'namespace'  => 'App\\Http\\Controllers\\UserDashboard',
], function () {

    /* Dashboard */
    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'DashboardController@index',
    ]);

    Route::get('/profile', [
        'as'   => 'dashboard',
        'uses' => 'DashboardController@index',
    ]);

    Route::get('/dashboard/profile/pdf', [
        'as'   => 'dashboard.profile.pdf',
        'uses' => 'DashboardController@profileToPdf',
    ]);

    /* Communication Preference */
    Route::get('/communication-preference', [
        'as'   => 'communication-preference',
        'uses' => 'CommunicationPreferenceController@index',
    ]);
    Route::post('communication-preference/update', [
        'as'   => 'communication-preference.update',
        'uses' => 'CommunicationPreferenceController@update',
    ]);

    /* Categories Preference */
    Route::get('/categories-preference', [
        'as'   => 'categories-preference',
        'uses' => 'CategoriesPreferenceController@index',
    ]);

    Route::post('categories-preference/update', [
        'as'   => 'categories-preference.update',
        'uses' => 'CategoriesPreferenceController@update',
    ]);

    /* Profile */
    Route::get('profile/edit', [
        'as'   => 'profile.edit',
        'uses' => 'ProfileController@edit',
    ]);
    Route::post('profile/update/password', [
        'as'   => 'profile.update-password',
        'uses' => 'ProfileController@updatePassword',
    ]);
    Route::post('profile/update', [
        'as'   => 'profile.update',
        'uses' => 'ProfileController@update',
    ]);
    Route::get('profile/edit/password', [
        'as'   => 'profile.edit-password',
        'uses' => 'ProfileController@editPassword',
    ]);
});