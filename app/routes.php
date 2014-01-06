<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'login', 'uses' => 'SessionsController@create']);

Route::resource('users', 'UsersController');

Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::resource('sessions', 'SessionsController', array('only' => array('store', 'create', 'destroy')));

Route::controller('password', 'RemindersController');

/**
 * Account Overview routes
 */
Route::get('account_overview/{id}', ['as'=>'account_overview_get', 'uses'=> 'UsersController@account_overview'])->where('id', '[0-9]+');
Route::post('account_overview/{id}',['as'=>'account_overview_post', 'uses'=>'UsersController@account_overview_store'])->where('id', '[0-9]+');

Route::post('add_account', ['as' => 'add_account', 'uses' => 'AccountsController@add_account']);