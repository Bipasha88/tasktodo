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

Route::get('/{home?}', function (){
    return view('task.alltasks');
})->where('home', 'alltasks|home')
    ->name('dashboard')->middleware('auth');

Route::get('/deletedtaskslist', function (){
    return view('task.deletedtasks');
})->name("deletedtaskslist")->middleware('auth');

Route::get('/basic', [BasicController::class,"index"]);
Route::get('/login', [AuthController::class,"login"])->name('login');
Route::get('/register', [AuthController::class,"register"]);
Route::post('/registerpost', [AuthController::class, 'register_post'])
    ->name('registerpost');
Route::post('/loginpost', [AuthController::class, 'login_post'])
    ->name('loginpost');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');



Route::post('/createtask',[TaskController::class,"create"]);

Route::delete('/softdelete/{id}',[TaskController::class,"softdelete"])->middleware('auth');

Route::post('/completetask/{id}',[TaskController::class,"completeTask"])
    ->name("completetask")->middleware('auth');

Route::post('/pendingtask/{id}',[TaskController::class,"pendingTask"])
    ->name("pendingtask")->middleware('auth');

Route::post('/retrivedeletedtask/{id}',[TaskController::class,"retriveDeletedTask"])
    ->name("retrivedeletedtask")->middleware('auth');

Route::get('/download', [TaskController::class, 'jsonFileDownload']);

Route::get('/gettasks',[TaskController::class,"index"])
    ->middleware('auth');

Route::get('/getdeletedtasks',[TaskController::class,"deletedTasksList"])
    ->name("getdeletedtasks")->middleware('auth');
