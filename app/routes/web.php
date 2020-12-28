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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/todolist/create', 'HomeController@create')->name('todolist.create');
Route::post('/todolist/create', 'HomeController@store')->name('todolist.store');
Route::get('/todolist/delete/{item}', 'HomeController@delete')->name('todolist.delete');
