<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::controller(AuthController::class)->group(function () {
    // route register
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    // route login
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    // route logout
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/artikel', [App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel');
Route::get('/show/{id}', [App\Http\Controllers\ShowController::class, 'show'])->name('show');
Route::post('/artikel', [App\Http\Controllers\ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/{id}', [App\Http\Controllers\ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [App\Http\Controllers\ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [App\Http\Controllers\ArtikelController::class, 'destroy'])->name('artikel.destroy');
Route::get('/profile', [App\Http\Controllers\UserProfileController::class, 'show'])->name('profile.show');
Route::post('/artikel/{id}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

});