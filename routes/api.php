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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/search/ajax_main', [App\Http\Controllers\SearchController::class, 'ajax_main']); 
Route::get('/search/ajax_sub', [App\Http\Controllers\SearchController::class, 'ajax_sub']); 
Route::post('/items/add/ajax', [App\Http\Controllers\ItemController::class, 'ajax']); 