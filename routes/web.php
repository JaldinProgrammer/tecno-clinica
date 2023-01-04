<?php

use App\Http\Controllers\DateController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
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
Route::post('/search', [TableController::class, 'search'])->name('search')->middleware(['admin', 'doctor']);


Route::prefix('user')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index')->middleware(['admin', 'doctor']);
});

Route::prefix('diagnostic')->group(function () {
    Route::get('create/{id}', [DiagnosticController::class, 'create'])->name('diagnostic.create')->middleware(['admin', 'doctor']);
    Route::get('create/date/{id}/{date}', [DiagnosticController::class, 'createFromDate'])->name('diagnostic.createFromDate')->middleware(['admin', 'doctor']);
    Route::get('index', [DiagnosticController::class, 'index'])->name('diagnostic.index')->middleware(['admin', 'doctor']);
    Route::post('store/{date?}', [DiagnosticController::class, 'store'])->name('diagnostic.store')->middleware(['admin', 'doctor']);
});

Route::prefix('reservation')->group(function () {
    Route::get('create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::get('index', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('show/{id}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::post('store', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('delete/{id}', [ReservationController::class, 'delete'])->name('reservation.delete');
});

Route::prefix('date')->group(function () {
    Route::get('create/{id}', [DateController::class, 'create'])->name('date.create');
    Route::get('index/{id}', [DateController::class, 'index'])->name('date.index');
    Route::get('show/{id}', [DateController::class, 'show'])->name('date.show');
    Route::post('store', [DateController::class, 'store'])->name('date.store');
//    Route::get('delete/{id}', [ReservationController::class, 'delete'])->name('date.delete');
});

