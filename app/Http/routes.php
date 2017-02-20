<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(Auth::guest()){
      return view('welcome');
    }
    else{
      return Redirect::to('home');
    }
});

Route::get('home', function (){
  if(Auth::guest()){
    return view('welcome');
  }
  else{
    return view('home');
  }
});
Route::get('/contacts', 'ContactController@index');
Route::post('/contact', 'ContactController@store');
Route::put('/contact/edit/{contact}', 'ContactController@update');
Route::delete('/contact/delete/{contact}', 'ContactController@destroy');


// route authentication
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// route registration
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
