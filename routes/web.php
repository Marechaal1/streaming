<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;

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

Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('site.index');

Route::get('/login/{error?}',  [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login',         [App\Http\Controllers\LoginController::class, 'login'])->name('site.login');

Route::get('/register', [App\Http\Controllers\UserController::class, 'registerView'])->name('site.register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('site.register');

Route::middleware('auth.middleware')->prefix('/app')->group(function (){
    Route::get('/home', [App\Http\Controllers\UserController::class , 'home']);
});
