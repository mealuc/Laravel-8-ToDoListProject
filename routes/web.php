<?php

use App\Events\ToDoCreatedEvent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Models\UserLog;
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
    return view('home.login');
});


Route::get('/user/login',[HomeController::class,'userLogin'])->name('userLogin');
Route::post('/user/loginCheck',[HomeController::class,'userLoginCheck'])->name('userLoginCheck');
Route::get('/user/logout',[HomeController::class,'userLogout'])->name('userLogout');

Route::middleware('auth')->group(function ()
{
    Route::get('/home',[HomeController::class,'index'])->name('home');
    Route::get('/task/add', [TaskController::class, 'create'])->name('addTask');
    Route::post('/task/store', [TaskController::class, 'store'])->name('storeTask');
    Route::post('/task/update/{id}', [TaskController::class, 'update'])->name('updateTask');
    Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('editTask');
    Route::get('/task/delete/{id}', [TaskController::class, 'destroy'])->name('deleteTask');
    Route::get('/task/deleteDeadline/{id}', [TaskController::class, 'deleteDeadline'])->name('deleteDeadline');
    Route::get('/task/completed/{id}', [TaskController::class, 'arrangeTask'])->name('arrangeTask');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
