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
    Route::post('/resources/admin/update','ResourceController@update')->name('resources.update');
    Route::get('/resources/admin/edit/{resource}','ResourceController@edit')->name('resources.edit');
    Route::get('/resources/balance/list', 'ResourceController@list')->name('resources.balance.list');
    Route::get('/resources/balance/{resource}', 'ResourceController@detail')->name('resources.balance.detail');
    Route::get('/resources/resequence/{resource}', 'ResourceController@resequence')->name('resources.resequence');
    // I used 'icon' instead of 'icons' because that made laravel to miss the route
    Route::get('/icon/capture', 'IconController@create')->name('icons.capture');
    Route::get('/icon/administrate', 'IconController@admin')->name('icons.administrate');
    Route::post('/icon/store', 'IconController@store')->name('icons.store');
    Route::get('/icon/edit/{icon}', 'IconController@edit')->name('icons.edit');
    Route::post('/icon/update', 'IconController@update')->name('icons.update');
    Route::get('/labels/administrate', 'LabelController@admin')->name('labels.administrate');
    Route::post('/labels/store', 'LabelController@store')->name('labels.store');
    Route::get('labels/capture', 'LabelController@create')->name('labels.capture');
    Route::get('labels/edit/{label}', 'LabelController@edit')->name('labels.edit');
    Route::post('labels/update', 'LabelController@update')->name('labels.update');
    Route::get('labels/delete/confirm/{label}', 'LabelController@confirmDelete')->name('labels.delete.confirm');
    Route::delete('labels/delete/destroy/{label}','LabelController@destroy')->name('labels.delete.destroy');

});
