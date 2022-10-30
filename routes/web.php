<?php

use App\Http\Controllers\Web\Article\ArticleController;
use App\Http\Controllers\Web\Category\CategoryControlller;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\UserController;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/search', [ArticleController::class, 'search']);
    
    Route::group(['prefix' => 'article'], function(){
        Route::get('/list', [ArticleController::class, 'index']);
        Route::get('/detail/{id}', [ArticleController::class, 'show']);
        Route::get('/write', [ArticleController::class, 'create']);
        Route::post('/write', [ArticleController::class, 'store']);
        Route::get('/edit/{id}', [ArticleController::class, 'edit']);
        Route::put('/update/{id}', [ArticleController::class, 'update']);
        Route::delete('/delete/{id}', [ArticleController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', [CategoryControlller::class, 'create']);
        Route::post('/', [CategoryControlller::class, 'store']);
        Route::get('/edit/{id}', [CategoryControlller::class, 'edit']);
        Route::put('/update/{id}', [CategoryControlller::class, 'update']);
        Route::delete('/delete/{id}', [CategoryControlller::class, 'destroy']);
    });
});
