<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\StatusController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/developers', DeveloperController::class);
Route::resource('/statuses', StatusController::class);
Route::resource('/tasks', TaskController::class);
Route::get('/tasks/{id}/generateTaskReport', [TaskController::class, 'generateTaskReport'])->name('tasks.generateTaskReport');
Route::get('/tasks/{id}/viewReport', [TaskController::class, 'viewReport'])->name('tasks.viewReport');
Route::put('/tasks/{id}/updateReport', [TaskController::class, 'updateReport'])->name('tasks.updateReport');

