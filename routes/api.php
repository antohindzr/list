<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\listuserController;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('listuser', listuserController::class);
    Route::post('listuser', 'App\Http\Controllers\API\listuserController@listGenerate');
    Route::delete('listuser', 'App\Http\Controllers\API\listuserController@destroy');
    Route::delete('delete/{id}', 'App\Http\Controllers\API\listuserController@delete');
});
Route::get('listuser', 'App\Http\Controllers\API\listuserController@list');

