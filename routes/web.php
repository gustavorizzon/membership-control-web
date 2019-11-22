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

    // Users
    Route::group(['middleware' => 'can:manage-users', 'prefix' => 'users', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'users',          'uses' => 'UsersController@index']);
        Route::get('/create',       ['as' => 'users.create',   'uses' => 'UsersController@create']);
        Route::post('/store',       ['as' => 'users.store',    'uses' => 'UsersController@store']);
        Route::get('/{id}/destroy', ['as' => 'users.destroy',  'uses' => 'UsersController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'users.edit',     'uses' => 'UsersController@edit']);
        Route::put('/{id}/update',  ['as' => 'users.update',   'uses' => 'UsersController@update']);
    });

    // Associates
    Route::group(['prefix' => 'associates', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'associates',          'uses' => 'AssociatesController@index']);
        Route::get('/create',       ['as' => 'associates.create',   'uses' => 'AssociatesController@create']);
        Route::post('/store',       ['as' => 'associates.store',    'uses' => 'AssociatesController@store']);
        Route::get('/{id}/destroy', ['as' => 'associates.destroy',  'uses' => 'AssociatesController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'associates.edit',     'uses' => 'AssociatesController@edit']);
        Route::put('/{id}/update',  ['as' => 'associates.update',   'uses' => 'AssociatesController@update']);
    });

    // TicketTypes
    Route::group(['prefix' => 'attraction_types', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'attraction_types',          'uses' => 'AttractionTypesController@index']);
        Route::get('/create',       ['as' => 'attraction_types.create',   'uses' => 'AttractionTypesController@create']);
        Route::post('/store',       ['as' => 'attraction_types.store',    'uses' => 'AttractionTypesController@store']);
        Route::get('/{id}/destroy', ['as' => 'attraction_types.destroy',  'uses' => 'AttractionTypesController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'attraction_types.edit',     'uses' => 'AttractionTypesController@edit']);
        Route::put('/{id}/update',  ['as' => 'attraction_types.update',   'uses' => 'AttractionTypesController@update']);
    });

    // TicketTypes
    Route::group(['prefix' => 'ticket_types', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'ticket_types',          'uses' => 'TicketTypesController@index']);
        Route::get('/create',       ['as' => 'ticket_types.create',   'uses' => 'TicketTypesController@create']);
        Route::post('/store',       ['as' => 'ticket_types.store',    'uses' => 'TicketTypesController@store']);
        Route::get('/{id}/destroy', ['as' => 'ticket_types.destroy',  'uses' => 'TicketTypesController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'ticket_types.edit',     'uses' => 'TicketTypesController@edit']);
        Route::put('/{id}/update',  ['as' => 'ticket_types.update',   'uses' => 'TicketTypesController@update']);
    });
});