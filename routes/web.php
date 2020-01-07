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
    return redirect('/dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth')->name('dashboard');


Route::get('/settings', 'SettingsController@index')->name('settings');
/**
 * Handle expenses 'routes' - member side.
 */
Route::post('/expense/add','ExpensesController@addExpense');
Route::post('/expense/delete','ExpensesController@deleteExpense');

/**
 * Routes - 'admin' side
 */
Route::get('/roles', 'RolesController@index')->name('roles');
Route::get('/user-management', 'UsersController@index')->name('users');
Route::post('/role/add','RolesController@addRole');
Route::post('/role/delete','RolesController@deleteRole');
Route::post('/settings/changepass','SettingsController@updatePassword');