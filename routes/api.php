<?php

use App\Http\Controllers\API\Article\ArticleController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Category\CategoryController;

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

Route::group(['prefix' => 'v1'], function(){
    Route::post('register', RegisterController::class); //User Register
    Route::post('login', LoginController::class); //User Login

    Route::group(['middleware' => ['auth:api']], function(){
        // User Logout
        Route::post('logout', LogoutController::class);
        
        // This route for Article
        Route::group(['prefix' => 'article'], function(){
            Route::get('/', [ArticleController::class, 'index']);
            Route::get('{id}', [ArticleController::class, 'show']);
            Route::post('create', [ArticleController::class, 'store']);
            Route::put('update/{id}', [ArticleController::class, 'update']);
            Route::delete('delete/{id}', [ArticleController::class, 'destroy']);
        });
        
        // This route for Category
        Route::group(['prefix' => 'category'], function(){
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('{id}', [CategoryController::class, 'show']);
            Route::post('create', [CategoryController::class, 'store']);
            Route::put('update/{id}', [CategoryController::class, 'update']);
            Route::delete('delete/{id}', [CategoryController::class, 'destroy']);
        });
    });
});
