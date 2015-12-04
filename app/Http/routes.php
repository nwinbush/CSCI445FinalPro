<?php

//Route::get('home', '\Bestmomo\Scafold\Http\Controllers\HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
//
//Route::get('edit', 'UserController@edit');
//Route::post('edit', 'UserController@store');
//Route::get('home', 'UserController@home');

//Route::post('edit', function(){
//    return "hi";
//});

//Route::post('edit', 'UserController@update');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'UserController@home');
    Route::post('home', 'UserController@home');
    Route::get('edit', 'UserController@edit');
    Route::post('edit', 'UserController@updater');

});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'Auth\AuthController@getRegister');
    //Route::get('home', 'Auth\AuthController@getRegister');
    //Route::get('/', 'Auth\AuthController@getRegister');
    //Route::get('edit', 'Auth\AuthController@getLogin');
});

Route::get('admin', 'adminController@teamPage');
Route::post('admin', 'adminController@generateTeams');

//if (Auth::user()) {
//    Route::get('home', 'UserController@home');
//    Route::get('edit', 'UserController@edit');
//} else{
//    Route::get('/', 'Auth\AuthController@getLogin');
//    Route::get('edit', 'Auth\AuthController@getLogin');
//}



//Route::get('home', 'UserController@home');