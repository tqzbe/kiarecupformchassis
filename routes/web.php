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
})->name('home');
Route::post('/send', 'FormController@send')->name('form.send');

// Files
Route::post('/files/store', 'FilesController@store')->name('files.store');
Route::post('/files/delete', 'FilesController@delete')->name('files.delete');