<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------    -----------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([ 'middleware'=>'auth'],function(){

//    Route::get('/', function () {return view('dashboard');});
    Route::get('/', 'HomeController@index');
    Route::get('users/{user}/block', 'UserController@blockConfirm');
    Route::resource('users', 'UserController');

    Route::get('villages/{village}/delete', 'VillageController@delete');
    Route::resource('villages', 'VillageController');

    Route::get('packages/{package}/delete', 'PackageController@delete');
    Route::resource('packages', 'PackageController');
    Route::get('/connections/{connection}/history', 'ConnectionController@showBillsHistory')->name('connections.history');
    Route::get('/connections/{connection}/invoice', 'ConnectionController@invoice')->name('connections.invoice');
    Route::resource('connections', 'ConnectionController');




    // save users's payments
    Route::post('/recoveries','RecoveryController@store')->name('recoveries.store');
    Route::get('/recoveries','RecoveryController@index')->name('recoveries.index');


    // specific bill's recoveries history,     show specific bill recoveries
    Route::get('/bills/{bill}/recoveries', 'BillController@showBillRecoveries')->name('bills.bill.recoveries');



    // temp
    Route::get('/generateBills', 'ConnectionController@generateBills');

});


Auth::routes();

Route::redirect('/register','/');
Route::get('/home', 'HomeController@index')->name('home');
