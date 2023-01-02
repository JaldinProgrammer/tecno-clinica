<?php

use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/unauthorized', [App\Http\Controllers\HomeController::class, 'unauthorized'])->name('unauthorized');

Route::prefix('user')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index')->middleware(['admin', 'doctor']);
});

Route::prefix('diagnostic')->group(function () {
    Route::get('create', [DiagnosticController::class, 'create'])->name('diagnostic.create')->middleware(['admin', 'doctor']);
    Route::get('index', [DiagnosticController::class, 'index'])->name('diagnostic.index')->middleware(['admin', 'doctor']);
});
