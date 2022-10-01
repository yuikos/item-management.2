<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/item/{class11?}/{class21?}', [App\Http\Controllers\HomeController::class, 'class'])->name("class");
Route::get('/csv/{class11?}/{class21?}', [App\Http\Controllers\HomeController::class, 'postCSV']);
Route::post('/favorite', [App\Http\Controllers\FavoriteController::class, 'favorite'])->name('favorite');
Route::post('/unfavorite', [App\Http\Controllers\FavoriteController::class, 'destrpy'])->name('unfavorite');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});


