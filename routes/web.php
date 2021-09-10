<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/basic', [BasicController::class,"index"]);
Route::get('/login', [AuthController::class,"login"])->name('login');
Route::get('/register', [AuthController::class,"register"]);
Route::post('/registerpost', [AuthController::class, 'register_post'])
    ->name('registerpost');
Route::post('/loginpost', [AuthController::class, 'login_post'])
    ->name('loginpost');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/alltasks',[TaskController::class,"index"])->name('dashboard')->middleware('auth');
