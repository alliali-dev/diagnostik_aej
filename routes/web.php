<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix'=>'Session','namespace'=>'Session','as'=>'session.'], function () {
    Route::post('/login', 'SessionController@login')->name('login');
});

Route::group(['prefix' => 'users','namespace'=>'Users', 'as' => 'users.'], function () {

    Route::post('autocomplete', 'AgenceController@autocomplete')->name('autocomplete');

    Route::get('/', 'UsersController@index')->name('index');
    Route::get('/create', 'UsersController@create')->name('create');
    Route::post('/store', 'UsersController@store')->name('store');
    Route::get('/{id}/edit', 'UsersController@edit')->name('edit');
    // Route::get('/{id}/edit', 'UsersController@edit')->name('edit');
    Route::get('/{id}/passwordreset', 'UsersController@passwordreset')->name('passwordReset');
    Route::put('/update', 'UsersController@update')->name('update');
    Route::get('/{id}/view', 'UsersController@show')->name('view');
    //Route::get('/{id}/view', 'UsersController@show')->name('view');
    Route::post('/delete', 'UsersController@delete')->name('delete');
    Route::delete('/destroy', 'UsersController@destroy')->name('destroy');
    Route::get('/{id}/login-as', 'UsersController@loginAs')->name('login-as');
    Route::get('/logout-as', 'UsersController@logoutAs')->name('logout-as');
    Route::get('/disabled', 'UsersController@disabledUsers')->name('disabled');
    Route::get('/deleted', 'UsersController@deletedUsers')->name('deleted');
    Route::get('/activeTable', 'UsersController@activeUsersTable')->name('activeUsersTable');
    Route::get('/disabledTable', 'UsersController@disabledUsersTable')->name('disabledUsersTable');
    Route::get('/deletedTable', 'UsersController@deletedUsersTable')->name('deletedUsersTable');

    Route::get('/profile', 'UsersController@profile')->name('profile');

    /* Users's Clients */
    Route::get('/manage-clients', 'UsersController@myClients')->name('myClients');
    Route::get('/manage-clients-table', 'UsersController@myClientsTable')->name('myClientsTable');
    Route::get('/manage-disabled-clients', 'UsersController@myDisabledClients')->name('myDisabledClients');
    Route::get('/manage-deleted-clients', 'UsersController@myDeletedClients')->name('myDeletedClients');
    Route::get('/manage-disabled-clients-table', 'UsersController@myDisabledClientsTable')->name('myDisabledClientsTable');
    Route::get('/manage-deleted-clients-table', 'UsersController@myDeletedClientsTable')->name('myDeletedClientsTable');

    /* Agency */
    Route::get('/agencies-clients', 'UsersController@agenciesClients')->name('agenciesClients');
    Route::get('/agencies-clients-table', 'UsersController@agenciesClientsTable')->name('agenciesClientsTable');
});
