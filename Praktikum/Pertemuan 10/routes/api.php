<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/mahasiswa', 'studentApiController@index')->name('index.api');
Route::post('/mahasiswa', 'studentApiController@store');
Route::put('/mahasiswa/{id}', 'studentApiController@update');
Route::delete('/mahasiswa/{id}', 'studentApiController@destroy');