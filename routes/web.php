<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return redirect()->route('task.all');
})->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name("logout");


Route::controller(TaskController::class)->middleware('auth')->group(function () {
    Route::get('/tasks', 'index')->name('task.all');
    Route::get('/createTask', 'create')->name('task.create');
    Route::post('/createTask', 'store');
    Route::get('/task/{id}', 'show')->name('task.show');
    Route::get('task/{id}/edit', 'edit')->name('task.edit');
    Route::put('task/{id}/edit', 'update');
    Route::delete('task/{id}', 'destroy');
});
Route::controller(CategoryController::class)->middleware('auth')->group(function () {
    Route::get('/category', 'index')->name('category.all');
    // Route::get('/createTask', 'create')->name('task.create');
    Route::post('/createCategory', 'store')->name('category.create');
    // Route::get('/task/{id}', 'show')->name('task.show');
    // Route::get('task/{id}/edit', 'edit')->name('task.edit');
    Route::put('task/{id}/edit', 'update')->name('category.update');
    // Route::delete('task/{id}', 'destroy');
});
