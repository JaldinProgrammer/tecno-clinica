<?php

use App\Http\Controllers\DateController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\DoctorSpecialityController;

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


Route::prefix('disease')->group(function () {
    Route::get('create', [DiseaseController::class, 'create'])->name('disease.create');
    Route::get('index', [DiseaseController::class, 'index'])->name('disease.index');
    Route::get('show', [DiseaseController::class, 'show'])->name('disease.show');
    Route::post('store', [DiseaseController::class, 'store'])->name('disease.store');
    Route::get('delete/{id}', [DiseaseController::class, 'delete'])->name('disease.delete');
});
//specialities

Route::prefix('speciality')->group(function () {
    Route::get('create', [SpecialityController::class, 'create'])->name('speciality.create');
    Route::get('index', [SpecialityController::class, 'index'])->name('speciality.index');
    Route::get('show', [SpecialityController::class, 'show'])->name('speciality.show');
    Route::post('store', [SpecialityController::class, 'store'])->name('speciality.store');
    Route::get('delete/{id}', [SpecialityController::class, 'delete'])->name('speciality.delete');
});

Route::prefix('promotion')->group(function () {
    Route::get('create', [PromotionController::class, 'create'])->name('promotion.create');
    Route::get('index', [PromotionController::class, 'index'])->name('promotion.index');
    Route::get('show', [PromotionController::class, 'show'])->name('promotion.show');
    Route::post('store', [PromotionController::class, 'store'])->name('promotion.store');
    Route::get('delete/{id}', [PromotionController::class, 'delete'])->name('promotion.delete');
});

Route::prefix('key')->group(function () {
    Route::get('create', [KeyController::class, 'create'])->name('key.create')->middleware(['admin', 'doctor']);
    Route::get('index', [KeyController::class, 'index'])->name('key.index')->middleware(['admin', 'doctor']);
    Route::post('store/{table?}', [KeyController::class, 'store'])->name('key.store')->middleware(['admin', 'doctor']);
    Route::get('delete/{id}', [KeyController::class, 'delete'])->name('key.delete');
});

Route::prefix('doctorSpeciality')->group(function () {
    Route::get('create/{id}', [DoctorSpecialityController::class, 'create'])->name('doctorSpeciality.create')->middleware(['admin']);
    Route::get('index', [DoctorSpecialityController::class, 'index'])->name('doctorSpeciality.index')->middleware(['admin']);
    Route::post('store', [DoctorSpecialityController::class, 'store'])->name('doctorSpeciality.store')->middleware(['admin']); //{users?,speciality?}
    Route::get('delete/{id}', [DoctorSpecialityController::class, 'delete'])->name('doctorSpeciality.delete');
});

