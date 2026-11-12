<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::group(['prefix'=>'categories'], function(){
    Route::get('/', App\Http\Controllers\Category\IndexController::class)->name('category.index');
    Route::get('/{category}/edit', App\Http\Controllers\Category\EditController::class)->name('category.edit');
    Route::patch('/{category}', App\Http\Controllers\Category\UpdateController::class)->name('category.update');
    Route::delete('/{category}', App\Http\Controllers\Category\DeleteController::class)->name('category.delete');
    Route::post('/', App\Http\Controllers\Category\StoreController::class)->name('category.store');
    Route::get('/create', App\Http\Controllers\Category\CreateController::class)->name('category.create');
    Route::get('/{category}', App\Http\Controllers\Category\ShowController::class)->name('category.show');
});

Route::group(['prefix'=>'tags'], function(){
    Route::get('/', App\Http\Controllers\Tag\IndexController::class)->name('tag.index');
    Route::get('/{tag}/edit', App\Http\Controllers\Tag\EditController::class)->name('tag.edit');
    Route::patch('/{tag}', App\Http\Controllers\Tag\UpdateController::class)->name('tag.update');
    Route::delete('/{tag}', App\Http\Controllers\Tag\DeleteController::class)->name('tag.delete');
    Route::post('/', App\Http\Controllers\Tag\StoreController::class)->name('tag.store');
    Route::get('/create', App\Http\Controllers\Tag\CreateController::class)->name('tag.create');
    Route::get('/{tag}', App\Http\Controllers\Tag\ShowController::class)->name('tag.show');
});

Route::group(['prefix'=>'colors'], function(){
    Route::get('/', App\Http\Controllers\Color\IndexController::class)->name('color.index');
    Route::get('/{color}/edit', App\Http\Controllers\Color\EditController::class)->name('color.edit');
    Route::patch('/{color}', App\Http\Controllers\Color\UpdateController::class)->name('color.update');
    Route::delete('/{color}', App\Http\Controllers\Color\DeleteController::class)->name('color.delete');
    Route::post('/', App\Http\Controllers\Color\StoreController::class)->name('color.store');
    Route::get('/create', App\Http\Controllers\Color\CreateController::class)->name('color.create');
    Route::get('/{color}', App\Http\Controllers\Color\ShowController::class)->name('color.show');
});

Route::group(['prefix'=>'persons'], function(){
    Route::get('/', App\Http\Controllers\User\IndexController::class)->name('user.index');
    Route::get('/{user}/edit', App\Http\Controllers\User\EditController::class)->name('user.edit');
    Route::patch('/{user}', App\Http\Controllers\User\UpdateController::class)->name('user.update');
    Route::delete('/{user}', App\Http\Controllers\User\DeleteController::class)->name('user.delete');
    Route::post('/', App\Http\Controllers\User\StoreController::class)->name('user.store');
    Route::get('/create', App\Http\Controllers\User\CreateController::class)->name('user.create');
    Route::get('/{user}', App\Http\Controllers\User\ShowController::class)->name('user.show');
});

Route::group(['prefix'=>'products'], function(){
    Route::get('/', App\Http\Controllers\Product\IndexController::class)->name('product.index');
    Route::get('/{product}/edit', App\Http\Controllers\Product\EditController::class)->name('product.edit');
    Route::patch('/{product}', App\Http\Controllers\Product\UpdateController::class)->name('product.update');
    Route::delete('/{product}', App\Http\Controllers\Product\DeleteController::class)->name('product.delete');
    Route::post('/', App\Http\Controllers\Product\StoreController::class)->name('product.store');
    Route::get('/create', App\Http\Controllers\Product\CreateController::class)->name('product.create');
    Route::get('/{product}', App\Http\Controllers\Product\ShowController::class)->name('product.show');
});

Route::group(['prefix'=>'group'], function(){
    Route::get('/', App\Http\Controllers\Group\IndexController::class)->name('group.index');
    Route::get('/{group}/edit', App\Http\Controllers\Group\EditController::class)->name('group.edit');
    Route::patch('/{group}', App\Http\Controllers\Group\UpdateController::class)->name('group.update');
    Route::delete('/{group}', App\Http\Controllers\Group\DeleteController::class)->name('group.delete');
    Route::post('/', App\Http\Controllers\Group\StoreController::class)->name('group.store');
    Route::get('/create', App\Http\Controllers\Group\CreateController::class)->name('group.create');
    Route::get('/{group}', App\Http\Controllers\Group\ShowController::class)->name('group.show');
});
Route::group(['prefix'=>'products'], function(){
    Route::get('/', App\Http\Controllers\Product\IndexController::class)->name('product.index');
    Route::get('/{product}/edit', App\Http\Controllers\Product\EditController::class)->name('product.edit');
    Route::patch('/{product}', App\Http\Controllers\Product\UpdateController::class)->name('product.update');
    Route::delete('/{product}', App\Http\Controllers\Product\DeleteController::class)->name('product.delete');
    Route::post('/', App\Http\Controllers\Product\StoreController::class)->name('product.store');
    Route::get('/create', App\Http\Controllers\Product\CreateController::class)->name('product.create');
    Route::get('/{product}', App\Http\Controllers\Product\ShowController::class)->name('product.show');
});
Route::group(['prefix'=>'orders'], function(){
    Route::get('/', App\Http\Controllers\Order\IndexController::class)->name('order.index');
    Route::get('/{order}/edit', App\Http\Controllers\Order\EditController::class)->name('order.edit');
    Route::patch('/{order}', App\Http\Controllers\Order\UpdateController::class)->name('order.update');
    Route::delete('/{order}', App\Http\Controllers\Order\DeleteController::class)->name('order.delete');
    Route::get('/{order}', App\Http\Controllers\Order\ShowController::class)->name('order.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
