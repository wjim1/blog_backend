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
Route::get('category', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('articles', [\App\Http\Controllers\ArticleController::class, 'index']);

Route::post('auth/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth'
], function(){
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
});
