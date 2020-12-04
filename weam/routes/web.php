<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

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

// TODO: add gzip/brotli support to the server, modify middleware SetEncoding and add 'encoding' as middleware to serve compressed ressources at user

Route::prefix('languages')->group(function() {

	Route::get('list','\App\Http\Controllers\LanguageController@availableLanguagesCodeAndLanguage');

	Route::get('available', '\App\Http\Controllers\LanguageController@availableLanguagesCode');

    Route::get('default','\App\Http\Controllers\LanguageController@defaultLanguage');

	Route::post('modify/{locale}', 'App\Http\Controllers\LanguageController@changeLanguage')->where('locale', '[a-z]{2}_[A-Z]{2}');

});

Route::middleware(['translations', 'cache.headers:public;max_age=2628000;etag'])->group(function() {

	Route::get('/', 'App\Http\Controllers\HomeController@index');

	Route::get('/settings', 'App\Http\Controllers\SettingsController@index');

	Route::get('/{any}', 'App\Http\Controllers\HomeController@index')->where('any', '.*');

});
