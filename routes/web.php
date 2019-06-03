<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PagesController@home')->name('inicio');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registro_escort','EscortController@index')->name('registro_escort');
Route::POST('/create_escort','EscortController@store')->name('create_scort');
Route::get('/getEscortInfo','EscortController@getEscortInfo' ); 

Route::post('images-upload', 'HomeController@imagesUploadPost')->name('images.upload');



 // Authentication Routes...
 Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
 Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'Auth\LoginController@logout')->name('logout');


 Route::POST('registro','UserController@store');

 

  // Password Reset Routes...
  if ($options['reset'] ?? true) {
         Route::resetPassword();
    }
  // Email Verification Routes...
   if ($options['verify'] ?? false) {
       Route::emailVerification();
   }