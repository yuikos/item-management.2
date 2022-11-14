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
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name("detail");
Route::get('/csv/{class11?}/{class21?}', [App\Http\Controllers\HomeController::class, 'postCSV']);

Route::post('/like/{id}', [App\Http\Controllers\LikeController::class, 'like'])->name('like');
Route::post('/unlike/{id}', [App\Http\Controllers\LikeController::class, 'unlike'])->name('unlike');

Route::get('/mypage', [App\Http\Controllers\MypageController::class, 'mypage'])->name("mypage");
Route::get('/mycsv', [App\Http\Controllers\MypageController::class, 'mypageCSV']);

Route::get('/rank/good', [App\Http\Controllers\RankController::class, 'good'])->name("good");
Route::get('/rank/keyword', [App\Http\Controllers\RankController::class, 'keyword'])->name("keyword");

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index']);
Route::get('/search/category', [App\Http\Controllers\SearchController::class, 'search']);
Route::get('/search/rank', [App\Http\Controllers\SearchController::class, 'rank']);

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});


