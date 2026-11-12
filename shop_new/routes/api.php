<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CorsMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', \App\Http\Controllers\API\Product\IndexController::class);
Route::post('/orders', \App\Http\Controllers\API\Order\StoreController::class);
Route::get('/filters', \App\Http\Controllers\API\Product\FilterListController::class);
Route::get('/products/{product}', \App\Http\Controllers\API\Product\ShowController::class);

// Видаліть одне з наступних визначень маршрутів в залежності від ваших потреб:
// Якщо потрібно застосувати CorsMiddleware до всіх маршрутів:
// Route::middleware([CorsMiddleware::class])->group(function () {
//     Route::post('/products', \App\Http\Controllers\API\Product\IndexController::class);
// });

// Якщо потрібно застосувати CorsMiddleware тільки до певних маршрутів:
Route::post('/', \App\Http\Controllers\API\Product\IndexController::class)->middleware([CorsMiddleware::class]);
