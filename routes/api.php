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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('listuser', 'App\Http\Controllers\listuser\listuserController@list');
//Route::get('listuser', 'App\Http\Controllers\listuser\listuserController@boot');
//Route::get('listuser/{uniq}', 'App\Http\Controllers\listuser\listuserController@listRetrieve');

//Route::post('list', 'App\Http\Controllers\listuser\listuserController@listSave');

//Route::put('listuser/{list}', 'App\Http\Controllers\listuser\listuserController@listEdit');

//Route::delete('listuser/{id}', 'App\Http\Controllers\listuser\listuserController@listDelete');

Route::post('listuser', 'App\Http\Controllers\listuser\listuserController@listGenerate');
//Route::post('listuser', 'App\Http\Controllers\listuser\listuserController@delall');