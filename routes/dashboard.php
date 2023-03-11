<?php

use App\Http\Controllers\Dashboard\Products\ProductController;
use App\Http\Controllers\Dashboard\Users\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->prefix('users')->group(function () {
    Route::middleware('grant:users,list')->get('/', [UserController::class, 'index'])->name('users');
    Route::middleware('grant:users,create')->get('create', [UserController::class, 'create'])->name('users.create');
    Route::middleware('grant:users,update')->get('edit/{user}', [UserController::class, 'edit'])->name('users.edit');
});

Route::middleware(['auth'])->prefix('products')->group(function () {
    Route::middleware('grant:products,list')->get('/', [ProductController::class, 'index'])->name('products');
    Route::middleware('grant:products,create')->get('create', [ProductController::class, 'create'])->name('products.create');
    Route::middleware('grant:products,update')->get('edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
});