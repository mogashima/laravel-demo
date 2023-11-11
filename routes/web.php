<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Web\WebUserController;
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

Route::redirect('/', 'home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ログイン関連のルート
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class,'register']);

// ユーザ
Route::controller(WebUserController::class)->group(function () {
    Route::get('/user', 'index')->name('web.user.index');
    Route::get('/user/create', 'create')->name('web.user.create');
    Route::get('/user/{user}', 'show')->name('web.user.show');
    Route::get('/user/{user}/edit', 'edit')->name('web.user.edit');
    Route::post('/user', 'store')->name('web.user.store');
    Route::delete('/user/{user}', 'destroy')->name('web.user.destroy');
});


