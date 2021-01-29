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



/**
 * non protected api routes
 */
Route::prefix('/exist')->group(function() {

    Route::get('/username/{username}', 'App\Http\Controllers\Auth\RegisterController@checkIfUsernameExist')
        ->where('username', '^[_a-zA-Z0-9]{3,25}$');
    Route::get('/email/{email}', 'App\Http\Controllers\Auth\RegisterController@checkIfEmailExist')
        ->where('email', '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$');

});



/**
 * protected api routes
 */
Route::middleware(['auth:api', 'scopes:user-data'])->group(function() {

    Route::prefix('/user')->group(function() {

        Route::get('/', function (Request $request) {
            return $request->user();
        });

    });

});
