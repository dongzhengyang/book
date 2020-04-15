<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::get('book', 'BookController@list')->name('book.list');
});

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::post('book', 'BookController@get')->name('book.get');
});

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::PUT('book', 'BookController@add')->name('book.add');
});

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::delete('book', 'BookController@del')->name('book.del');
});

