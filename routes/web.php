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

Route::get('/admin', function () {
    return view('admin/home');
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