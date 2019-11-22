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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::group(['middleware' => 'auth'], function () {
    // Home Page
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Associates
    Route::group(['prefix' => 'associates', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'associates',          'uses' => 'AssociatesController@index']);
        Route::get('/create',       ['as' => 'associates.create',   'uses' => 'AssociatesController@create']);
        Route::post('/store',       ['as' => 'associates.store',    'uses' => 'AssociatesController@store']);
        Route::get('/{id}/destroy', ['as' => 'associates.destroy',  'uses' => 'AssociatesController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'associates.edit',     'uses' => 'AssociatesController@edit']);
        Route::put('/{id}/update',  ['as' => 'associates.update',   'uses' => 'AssociatesController@update']);
    });
});