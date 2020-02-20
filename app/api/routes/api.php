<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['api']], function() {
    Route::resource('users', 'Api\UserController');
    Route::match(['put', 'patch'], 'users/{user}/restore', 'Api\UserController@restore')->name('users.restore');
    Route::delete('users/{user}/force-delete', 'Api\UserController@forceDelete')->name('users.force-delete');
});
