<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\User;
use App\Http\Resources\TodolistResource;
use App\Http\Resources\TodolistCollection;
use App\TodolistItem;
use App\Http\Resources\UserItemsResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    return new UserCollection(User::all());
});

Route::get('/user/{user}', function ($id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/todolist/{id}', function ($id) {
    return new TodolistResource(TodolistItem::findOrFail($id));
});

Route::get('/todolists', function () {
    return new TodolistCollection(TodolistItem::all());
});

Route::get('/user/{user}/items', function ($id) {
    return new UserItemsResource(User::findOrFail($id));
});
