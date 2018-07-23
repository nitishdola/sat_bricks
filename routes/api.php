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

Route::get('/get-brick-type-data', 'REST\APIController@getBrickTypeData')->name('brick_type_data');
Route::get('/all-sardar-workers-data', 'REST\APIController@getSardarWorkersData')->name('api.sardar_worker_data');