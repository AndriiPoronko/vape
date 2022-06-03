<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Main\AdminController;
use App\Http\Controllers\ProductsController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group(['middleware' => 'jwt'], function(){
    });
});

Route::group(['prefix' => 'products'], function(){
    Route::get('/', ProductsController::class);
});

Route::post('/orders', \App\Http\Controllers\Order\StoreController::class)->name('order.store');
Route::get('/categories', \App\Http\Controllers\CategoryController::class);
Route::get('/trends', \App\Http\Controllers\TrendController::class);
Route::post('/user', \App\Http\Controllers\StoreController::class);
Route::get('/newArrivals', \App\Http\Controllers\NewArrivalsController::class);


