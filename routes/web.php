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

Route::middleware(['auth'])->group( function(){

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    

    /**
     * Handle expenses 'routes' - member side.
     */
    Route::post('/expense/add','ExpensesController@addExpense');
    Route::post('/expense/delete','ExpensesController@deleteExpense');


    /**
     * Routes - 'admin' side
     */
    Route::get('/user-management', 'UsersController@index')->name('users');
    Route::post('/user/add', 'UsersController@addUser');
    Route::post('/user/delete', 'UsersController@deleteUser');
    Route::post('/user/update','UsersController@updateUser');

    Route::get('/roles', 'RolesController@index')->name('roles');
    Route::post('/role/add','RolesController@addRole');
    Route::post('/role/delete','RolesController@deleteRole');
    Route::post('/role/update','RolesController@updateRole');


    /**
     * Expenses - 'admin' side
     */
    Route::match(['get','post'], '/expenses/categories','ExpensesController@index')->name('expenses-category');
    Route::post('/expenses/categories/delete','ExpensesController@deleteExpenseCategory');
    Route::post('/expenses/categories/update','ExpensesController@updateExpenseCategory');

    /**
     * Settings - 'admin/member' side
     */
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/changepass','SettingsController@updatePassword');

});