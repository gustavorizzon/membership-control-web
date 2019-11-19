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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Home Page
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Associates
    Route::group(['prefix' => 'associates', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('', ['as' => 'associates', 'uses' => 'AssociatesController@index']);
    });
    
    // // Rotas do model Habito
    // Route::group(["prefix" => "habitos", "where" => ["id" => "[0-9]+"]], function () {
    //     Route::any("",              ['as' => 'habitos',           'uses' => "HabitosController@index"]);
    //     Route::get("/relatorio",    ['as' => 'habitos.relatorio', 'uses' => "HabitosController@geraPdf"]);
    //     Route::get("/create",       ['as' => 'habitos.create',    'uses' => "HabitosController@create"]);
    //     Route::post("/store",       ['as' => 'habitos.store',     'uses' => "HabitosController@store"]);
    //     Route::get("/{id}/destroy", ['as' => 'habitos.destroy',   'uses' => "HabitosController@destroy"]);
    //     Route::get("/{id}/edit",    ['as' => 'habitos.edit',      'uses' => "HabitosController@edit"]);
    //     Route::put("/{id}/update",  ['as' => 'habitos.update',    'uses' => "HabitosController@update"]);
    // });

    // // Rotas do model Historico
    // Route::group(["prefix" => "historicos", "where" => ["id" => "[0-9]+"]], function () {
    //     Route::get("",              ['as' => 'historicos',         'uses' => "HistoricoController@index"]);
    //     Route::get("/create",       ['as' => 'historicos.create',  'uses' => "HistoricoController@create"]);
    //     Route::post("/store",       ['as' => 'historicos.store',   'uses' => "HistoricoController@store"]);
    //     Route::get("/{id}/destroy", ['as' => 'historicos.destroy', 'uses' => "HistoricoController@destroy"]);
    //     Route::get("/{id}/edit",    ['as' => 'historicos.edit',    'uses' => "HistoricoController@edit"]);
    //     Route::put("/{id}/update",  ['as' => 'historicos.update',  'uses' => "HistoricoController@update"]);

    //     Route::get('createmaster', ['as' => 'historicos.createmaster', 'uses' => 'HistoricoController@createMaster']);
    //     Route::post('masterdetail', ['as' => 'historicos.masterdetail', 'uses' => 'HistoricoController@masterDetail']);
    // });
});