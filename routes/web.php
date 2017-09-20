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
| Routes for all the business activities.
|
*/


Route::group(['middleware' => 'can:accessAdminPanel'], function() {

    Route::get('/admin', 'Admin\DashboardController@index');

    // Business Category
    Route::get('/admin/businesscategory', 'Admin\BusinessCategoryController@index');
    Route::get('/admin/businesscategory/create', 'Admin\BusinessCategoryController@create');
    Route::get('/admin/businesscategory/edit/{businessCategory}', 'Admin\BusinessCategoryController@edit');
    Route::post('/admin/businesscategory', 'Admin\BusinessCategoryController@store');
    Route::post('/admin/businesscategory/update/{businessCategory}', 'Admin\BusinessCategoryController@update');
    Route::delete('/admin/businesscategory/{businessCategory}', 'Admin\BusinessCategoryController@destroy');

    // Business Badges

    Route::get('/admin/badges', 'Admin\BadgeController@index');
    Route::get('/admin/badge/create', 'Admin\BadgeController@create');
    Route::get('/admin/badge/edit/{badge}', 'Admin\BadgeController@edit');
    Route::post('admin/badges', 'Admin\BadgeController@store');
    Route::post('/admin/badge/update/{badge}', 'Admin\BadgeController@update');
    Route::get('/admin/badge/delete/{badge}', 'Admin\BadgeController@destroy');

    //Partner Category

    Route::get('/admin/partners/','Admin\PartnerController@index');
    Route::post('/admin/partners/create','Admin\PartnerController@store');

});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Routes for all the business activities.
|
*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register/verify/{token}', 'Auth\RegisterController@verify');


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