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


Route::get('/membership/{membership}/education','MembershipsController@education');
Route::delete('/education/{education}/delete','MembershipsController@destroyEducation');

Route::get('/membership/{membership}/companies','MembershipsController@companies');
Route::delete('/companies/{company}/delete','MembershipsController@destroyCompany');