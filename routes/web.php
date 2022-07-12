<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Front\BeritaController;

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

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('sekilas-organisasi', [FrontController::class, 'sekilas'])->name('front.sekilas');
Route::get('struktur-organisasi', [FrontController::class, 'struktur'])->name('front.struktur');
Route::resource('k', App\Http\Controllers\Front\KegiatanController::class);
Route::resource('b', App\Http\Controllers\Front\BeritaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'detail'])->name('users.detail');
    Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::put('users/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::put('users-password/{id}', [\App\Http\Controllers\UserController::class, 'password'])->name('users.password');
    Route::delete('users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('sekilas', [\App\Http\Controllers\SekilasController::class, 'show'])->name('sekilas.show');
    Route::put('sekilas', [\App\Http\Controllers\SekilasController::class, 'update'])->name('sekilas.update');

    Route::get('struktur', [\App\Http\Controllers\StrukturController::class, 'show'])->name('struktur.show');
    Route::put('struktur', [\App\Http\Controllers\StrukturController::class, 'update'])->name('struktur.update');

    Route::resource('berita', \App\Http\Controllers\BeritaController::class);
    Route::resource('kegiatan', \App\Http\Controllers\KegiatanController::class);
    Route::resource('kegiatan-foto', \App\Http\Controllers\KegiatanFotoController::class);

});
