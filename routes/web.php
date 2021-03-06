<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
 */
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Manera alternativa de usar el middleware de autenticacion
Route::middleware('auth')->group(function (){
    Route::get('/user/profile', function() {})->name('user.profile.show');

    Route::get('/transaction/capture', 'TransactionController@capture')->name('transaction.capture');
    Route::post('/transaction/store', 'TransactionController@store')->name('transaction.store');
    Route::get('/transaction/all','TransactionController@all')->name('transaction.all');
    Route::get('/transaction/find', 'TransactionController@find')->name('transaction.find');
    Route::post('/transaction/results', 'TransactionController@results')->name('transaction.results');
    Route::get('/transaction/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
    Route::get('/transaction/detail/{id}', 'TransactionController@detail')->name('transaction.detail');
    Route::get('/transaction/populate_categories/{origin}/{destiny}', 'TransactionController@populate_categories')->name('transaction.populate_categories');
    Route::get('/transaction/populate_parent_categories/{type}', 'TransactionController@populate_parent_categories')->name('transaction.populate_parent_categories');
    Route::get('/categories/store/{name}/{type}/{parent}/{token}', 'CategoryController@store' )->name('categories.store');
    Route::get('/resources/admin','ResourceController@administrate')->name('resources.admin');
    Route::get('/resources/admin/create','ResourceController@create')->name('resources.create');
    Route::post('/resources/admin/store','ResourceController@store')->name('resources.store');
    Route::get('/resources/balance/list', 'ResourceController@list')->name('resources.balance.list');
    Route::get('/resources/balance/{resource}', 'ResourceController@detail')->name('resources.balance.detail');
});




