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
    Route::get('/admin/partners','Admin\PartnerController@view');
    Route::get('/admin/partners/list','Admin\PartnerController@list');
    Route::get('/admin/partners/edit/{partner}','Admin\PartnerController@edit');
    Route::post('/admin/partners/update/{partner}','Admin\PartnerController@update');

    Route::get('/admin/partner/create','Admin\PartnerController@index');
    Route::post('/admin/partners','Admin\PartnerController@store');

        //Customer Category
    Route::get('/admin/customers','Admin\CustomerController@index');
    Route::get('/admin/customers/edit/{customer}','Admin\CustomerController@edit');
    Route::post('admin/customers/update/{customer}','Admin\CustomerController@update');

    //Business

    Route::get('admin/businesses','Admin\AdminBusinessController@index');
    Route::get('admin/businesses/edit/{business}','Admin\AdminBusinessController@edit');
    Route::post('admin/businesses/update/{business}','Admin\AdminBusinessController@update');

    //Business Option

    Route::get('admin/businessoption','Admin\BusinessOptionController@index');
    Route::get('admin/businessoption/create','Admin\BusinessOptionController@create');
    Route::post('admin/businessoption','Admin\BusinessOptionController@store');

        //Autosuggest
    Route::get('/admin/suggest/','Admin\BusinessOptionController@autoSuggest');


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


/*
|--------------------------------------------------------------------------
| Registration Routes
|--------------------------------------------------------------------------
|
| Routes for all the registration activities.
|
*/

Route::get('/start', function () {
    return view('start');
});
