<?php

use App\Http\Controllers\Users\UserController;
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
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::get('create', [UserController::class, 'create'])->name('users.create');

});