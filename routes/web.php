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
Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
//Users
Route::get('/users/new', ['as' => 'admin.user.new', 'uses' => 'UserController@newUser']);
Route::get('/users', ['as' => 'admin.users', 'uses' => 'UserController@users']);
Route::get('/users/{id}', ['as' => 'admin.userEdit', 'uses' => 'UserController@editUser']);
Route::delete('/users/{id}', ['uses' => 'UserController@destroy']);
Route::post('/user', ['as' => 'admin.users', 'uses' => 'UserController@postEdit']);


Route::get('/transactions', ['as' => 'admin.transactions', 'uses' => 'TransactionController@transactions']);
Route::get('/transactions/exportCSV', 'TransactionController@exportCSV');

Route::get('/general_settings', 'SettingController@general_settings')->name('general_settings');
Route::post('/general_setting', ['as' => 'admin.general_setting.post', 'uses' => 'SettingController@postGeneralSetting']);

Route::get('/security_settings', 'SettingController@security_settings')->name('security_settings');
Route::post('/security_settings', ['as' => 'admin.security_setting.post', 'uses' => 'SettingController@postSecuritySetting']);


Route::get('/wallets', ['as' => 'admin.wallets', 'uses' => 'WalletController@wallets']);
