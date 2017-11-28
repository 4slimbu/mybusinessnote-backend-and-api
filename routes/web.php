<?php

/*
|--------------------------------------------------------------------------
| Web General Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Routes for all the admin activities.
|
*/


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'can:accessAdminPanel',
    'namespace' => 'App\Http\Controllers\Admin'
], function() {

    Route::get('/', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index'
    ]);

    /* Business Category */
    Route::get('business-category', [
        'as' => 'business-category',
        'uses' => 'BusinessCategoryController@index',
    ]);
    Route::get('business-category/create', [
        'as' => 'business-category.create',
        'uses' => 'BusinessCategoryController@create',
    ]);
    Route::post('business-category/store', [
        'as' => 'business-category.store',
        'uses' => 'BusinessCategoryController@store',
    ]);
    Route::get('business-category/edit/{businessCategory}', [
        'as' => 'business-category.edit',
        'uses' => 'BusinessCategoryController@edit'
    ]);
    Route::post('business-category/update/{businessCategory}', [
        'as' => 'business-category.update',
        'uses' => 'BusinessCategoryController@update',
    ]);
    Route::delete('business-category/destroy/{businessCategory}', [
        'as' => 'business-category.destroy',
        'uses' => 'BusinessCategoryController@destroy'
    ]);


    /* Badge */
    Route::get('badge', [
        'as' => 'badge',
        'uses' => 'BadgeController@index',
    ]);
    Route::get('badge/create', [
        'as' => 'badge.create',
        'uses' => 'BadgeController@create',
    ]);
    Route::post('badge/store', [
        'as' => 'badge.store',
        'uses' => 'BadgeController@store',
    ]);
    Route::get('badge/edit/{badge}', [
        'as' => 'badge.edit',
        'uses' => 'BadgeController@edit'
    ]);
    Route::post('badge/update/{badge}', [
        'as' => 'badge.update',
        'uses' => 'BadgeController@update',
    ]);
    Route::delete('badge/destroy/{badge}', [
        'as' => 'badge.destroy',
        'uses' => 'BadgeController@destroy'
    ]);

    /* User */
    Route::get('user', [
        'as' => 'user',
        'uses' => 'UserController@index',
    ]);
    Route::get('user/create', [
        'as' => 'user.create',
        'uses' => 'UserController@create',
    ]);
    Route::post('user/store', [
        'as' => 'user.store',
        'uses' => 'UserController@store',
    ]);
    Route::get('user/edit/{user}', [
        'as' => 'user.edit',
        'uses' => 'UserController@edit'
    ]);
    Route::post('user/update/{user}', [
        'as' => 'user.update',
        'uses' => 'UserController@update',
    ]);
    Route::delete('user/destroy/{user}', [
        'as' => 'user.destroy',
        'uses' => 'UserController@destroy'
    ]);


    /* Partner */
    Route::get('partner', [
        'as' => 'partner',
        'uses' => 'PartnerController@index',
    ]);
    Route::get('partner/create', [
        'as' => 'partner.create',
        'uses' => 'PartnerController@create',
    ]);
    Route::post('partner/store', [
        'as' => 'partner.store',
        'uses' => 'PartnerController@store',
    ]);
    Route::get('partner/edit/{partner}', [
        'as' => 'partner.edit',
        'uses' => 'PartnerController@edit'
    ]);
    Route::post('partner/update/{partner}', [
        'as' => 'partner.update',
        'uses' => 'PartnerController@update',
    ]);
    Route::delete('partner/destroy/{partner}', [
        'as' => 'partner.destroy',
        'uses' => 'PartnerController@destroy'
    ]);

    /* Customer */
    Route::get('customer', [
        'as' => 'customer',
        'uses' => 'CustomerController@index',
    ]);
    Route::get('customer/create', [
        'as' => 'customer.create',
        'uses' => 'CustomerController@create',
    ]);
    Route::post('customer/store', [
        'as' => 'customer.store',
        'uses' => 'CustomerController@store',
    ]);
    Route::get('customer/edit/{customer}', [
        'as' => 'customer.edit',
        'uses' => 'CustomerController@edit'
    ]);
    Route::post('customer/update/{customer}', [
        'as' => 'customer.update',
        'uses' => 'CustomerController@update',
    ]);
    Route::delete('customer/destroy/{customer}', [
        'as' => 'customer.destroy',
        'uses' => 'CustomerController@destroy'
    ]);

    /* Business */
    Route::get('business', [
        'as' => 'business',
        'uses' => 'BusinessController@index',
    ]);
    Route::get('business/create', [
        'as' => 'business.create',
        'uses' => 'BusinessController@create',
    ]);
    Route::post('business/store', [
        'as' => 'business.store',
        'uses' => 'BusinessController@store',
    ]);
    Route::get('business/edit/{business}', [
        'as' => 'business.edit',
        'uses' => 'BusinessController@edit'
    ]);
    Route::post('business/update/{business}', [
        'as' => 'business.update',
        'uses' => 'BusinessController@update',
    ]);
    Route::delete('business/destroy/{business}', [
        'as' => 'business.destroy',
        'uses' => 'BusinessController@destroy'
    ]);

    /* Business Option */
    Route::get('business-option', [
        'as' => 'business-option',
        'uses' => 'BusinessOptionController@index',
    ]);
    Route::get('business-option/create', [
        'as' => 'business-option.create',
        'uses' => 'BusinessOptionController@create',
    ]);
    Route::post('business-option/store', [
        'as' => 'business-option.store',
        'uses' => 'BusinessOptionController@store',
    ]);
    Route::get('business-option/edit/{businessOption}', [
        'as' => 'business-option.edit',
        'uses' => 'BusinessOptionController@edit'
    ]);
    Route::post('business-option/update/{businessOption}', [
        'as' => 'business-option.update',
        'uses' => 'BusinessOptionController@update',
    ]);
    Route::delete('business-option/destroy/{businessOption}', [
        'as' => 'business-option.destroy',
        'uses' => 'BusinessOptionController@destroy'
    ]);

    /* Level */
    Route::get('level', [
        'as' => 'level',
        'uses' => 'LevelController@index',
    ]);
    Route::get('level/create', [
        'as' => 'level.create',
        'uses' => 'LevelController@create',
    ]);
    Route::post('level/store', [
        'as' => 'level.store',
        'uses' => 'LevelController@store',
    ]);
    Route::get('level/edit/{level}', [
        'as' => 'level.edit',
        'uses' => 'LevelController@edit'
    ]);
    Route::post('level/update/{level}', [
        'as' => 'level.update',
        'uses' => 'LevelController@update',
    ]);
    Route::delete('level/destroy/{level}', [
        'as' => 'level.destroy',
        'uses' => 'LevelController@destroy'
    ]);

//        //Customer Category
//    Route::get('/admin/customers','Admin\CustomerController@index');
//    Route::get('/admin/customers/edit/{customer}','Admin\CustomerController@edit');
//    Route::post('admin/customers/update/{customer}','Admin\CustomerController@update');
//
//    //Business
//
//    Route::get('admin/businesses','Admin\AdminBusinessController@index');
//    Route::get('admin/businesses/edit/{business}','Admin\AdminBusinessController@edit');
//    Route::post('admin/businesses/update/{business}','Admin\AdminBusinessController@update');
//
//    //Business Option
//
//    Route::get('admin/businessoption','Admin\BusinessOptionController@index');
//    Route::get('admin/businessoption/create','Admin\BusinessOptionController@create');
//    Route::post('admin/businessoption','Admin\BusinessOptionController@store');
//
//    Route::get('admin/businessoption/edit/{businessoption}','Admin\BusinessOptionController@edit');
//    Route::post('admin/businessoption/update/{option}','Admin\BusinessOptionController@update');



});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Routes for all the business activities.
|
*/

Route::group([ 'namespace' => 'App\Http\Controllers'], function () {
    Auth::routes();


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('profiles/{user}','HomeController@profile');
    Route::get('user/{businessid}','HomeController@business');
    Route::get('business/edit/{business}','HomeController@businessEdit');
    Route::post('business/update/{business}','HomeController@businessUpdate');
    Route::get('/register/verify/{token}', 'Auth\RegisterController@verify');

    Route::get('password-change','HomeController@passwordChange');

    Route::post('password-change','HomeController@passwordReset');


    /*
    |--------------------------------------------------------------------------
    | Business Routes
    |--------------------------------------------------------------------------
    |
    | Routes for all the business activities.
    |
    */

    Route::post('/business', 'BusinessController@store');
    Route::get('/businesses', 'BusinessController@index');
    Route::get('/business/{business}', 'BusinessController@show');

});



/*
|--------------------------------------------------------------------------
| Registration Routes
|--------------------------------------------------------------------------
|
| Routes for all the registration activities.
|
*/

Route::get('/start', 'App\Http\Controllers\PageController@home');
Route::get('/start/level/{level}', [
    'as' => 'start.level',
    'uses' => 'App\Http\Controllers\PageController@level'
]);

Route::get('/start/section/{section}', [
    'as' => 'start.section',
    'uses' => 'App\Http\Controllers\PageController@section'
]);