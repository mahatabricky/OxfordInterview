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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/create-accounts','BankAccountsController@create')->name('account.create');
Route::get('/all-accounts','BankAccountsController@index')->name('account.index');
Route::post('/account-store','BankAccountsController@store')->name('account.store');

Route::get('/account/{id}','BankAccountsController@edit')->name('account.edit');

Route::put('/account-update/{id}','BankAccountsController@update')->name('account.update');
Route::get('/account-delete/{id}','BankAccountsController@destroy')->name('account.destroy');
