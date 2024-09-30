<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Middleware;

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

Route::get('/', [Controllers\Home::class, 'show'])->name('home');
Route::get('cages', [Controllers\Cage::class, 'show'])->name('cages');

Route::middleware(Middleware\RedirectIfNotAuthenticated::class)->group(function () {
    Route::get('login', [Controllers\Login::class, 'show'])->name('login');
    Route::post('login_user', [Controllers\Login::class, 'login_user'])->name('login_user');
});

Route::middleware(Middleware\RedirectIfAuthenticated::class)->group(function () {
    Route::get('logout_user', [Controllers\Logout::class, 'logout_user'])->name('logout_user');

    Route::get('animals', [Controllers\Animal::class, 'show'])->name('animals');
    Route::get('new_animal', [Controllers\Animal::class, 'new_animal'])->name('new_animal');
    Route::get('update_animal', [Controllers\Animal::class, 'update_animal'])->name('update_animal');

    Route::get('new_cage', [Controllers\Cage::class, 'new_cage'])->name('new_cage');
    Route::get('update_cage', [Controllers\Cage::class, 'update_cage'])->name('update_cage');
});
