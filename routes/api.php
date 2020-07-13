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

Route::get('country', 'Api\Country\CountryController@country');
Route::get('country/{id}', 'Api\Country\CountryController@countryById');

Route::post('login', 'Api\Auth\LoginController@login');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('country', 'Api\Country\CountryController@countrySave');
    Route::put('country/{id}', 'Api\Country\CountryController@countryEdit');
    Route::delete('country/{id}', 'Api\Country\CountryController@countryDelete');
    Route::get('refresh', 'Api\Auth\LoginController@refresh');
});
