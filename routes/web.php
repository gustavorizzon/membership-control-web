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

    // Attractions
    Route::group(['prefix' => 'attractions', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'attractions',          'uses' => 'AttractionsController@index']);
        Route::get('/create',       ['as' => 'attractions.create',   'uses' => 'AttractionsController@create']);
        Route::post('/store',       ['as' => 'attractions.store',    'uses' => 'AttractionsController@store']);
        Route::get('/{id}/destroy', ['as' => 'attractions.destroy',  'uses' => 'AttractionsController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'attractions.edit',     'uses' => 'AttractionsController@edit']);
        Route::put('/{id}/update',  ['as' => 'attractions.update',   'uses' => 'AttractionsController@update']);
    });

    // AttractionTypes
    Route::group(['prefix' => 'attraction_types', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'attraction_types',          'uses' => 'AttractionTypesController@index']);
        Route::get('/create',       ['as' => 'attraction_types.create',   'uses' => 'AttractionTypesController@create']);
        Route::post('/store',       ['as' => 'attraction_types.store',    'uses' => 'AttractionTypesController@store']);
        Route::get('/{id}/destroy', ['as' => 'attraction_types.destroy',  'uses' => 'AttractionTypesController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'attraction_types.edit',     'uses' => 'AttractionTypesController@edit']);
        Route::put('/{id}/update',  ['as' => 'attraction_types.update',   'uses' => 'AttractionTypesController@update']);
    });

    // Places
    Route::group(['prefix' => 'places', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'places',          'uses' => 'PlacesController@index']);
        Route::get('/create',       ['as' => 'places.create',   'uses' => 'PlacesController@create']);
        Route::post('/store',       ['as' => 'places.store',    'uses' => 'PlacesController@store']);
        Route::get('/{id}/destroy', ['as' => 'places.destroy',  'uses' => 'PlacesController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'places.edit',     'uses' => 'PlacesController@edit']);
        Route::put('/{id}/update',  ['as' => 'places.update',   'uses' => 'PlacesController@update']);
    });

    // PlaceTypes
    Route::group(['prefix' => 'place_types', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'place_types',          'uses' => 'PlaceTypesController@index']);
        Route::get('/create',       ['as' => 'place_types.create',   'uses' => 'PlaceTypesController@create']);
        Route::post('/store',       ['as' => 'place_types.store',    'uses' => 'PlaceTypesController@store']);
        Route::get('/{id}/destroy', ['as' => 'place_types.destroy',  'uses' => 'PlaceTypesController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'place_types.edit',     'uses' => 'PlaceTypesController@edit']);
        Route::put('/{id}/update',  ['as' => 'place_types.update',   'uses' => 'PlaceTypesController@update']);
    });

    // Reservations
    Route::group(['prefix' => 'reservations', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',              ['as' => 'reservations',          'uses' => 'ReservationsController@index']);
        Route::get('/create',       ['as' => 'reservations.create',   'uses' => 'ReservationsController@create']);
        Route::post('/store',       ['as' => 'reservations.store',    'uses' => 'ReservationsController@store']);
        Route::get('/{id}/destroy', ['as' => 'reservations.destroy',  'uses' => 'ReservationsController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'reservations.edit',     'uses' => 'ReservationsController@edit']);
        Route::put('/{id}/update',  ['as' => 'reservations.update',   'uses' => 'ReservationsController@update']);
    });

    // Reservation Guests
    Route::group(['prefix' => 'reservation_guests', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('/{id}',         ['as' => 'reservation_guests',          'uses' => 'ReservationGuestsController@index']);
        Route::get('/{id}/create',  ['as' => 'reservation_guests.create',   'uses' => 'ReservationGuestsController@create']);
        Route::post('/store',       ['as' => 'reservation_guests.store',    'uses' => 'ReservationGuestsController@store']);
        Route::get('/{id}/destroy', ['as' => 'reservation_guests.destroy',  'uses' => 'ReservationGuestsController@destroy']);
        Route::get('/{id}/edit',    ['as' => 'reservation_guests.edit',     'uses' => 'ReservationGuestsController@edit']);
        Route::put('/{id}/update',  ['as' => 'reservation_guests.update',   'uses' => 'ReservationGuestsController@update']);
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