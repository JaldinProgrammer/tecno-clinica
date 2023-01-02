<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialitiesController;
use App\Http\Controllers\DiseasesController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\DoctorSpecialitiesController;
use App\Http\Controllers\KeysController;
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

//Route::resource('specilities','App\Http\Controllers\SpecialitiesController');

//specilities routes
Route::get('inputspe', [SpecialitiesController::class, 'index']);
Route::post('store',[SpecialitiesController::class, 'store']);
Route::get('edit/{id}',[SpecialitiesController::class, 'edit']);
Route::post('update',[SpecialitiesController::class, 'update'])->name('update');
Route::get('delete/{id}',[SpecialitiesController::class, 'delete']);
//diseases routes

Route::get('indexdis', [DiseasesController::class, 'index']);
Route::post('storedis',[DiseasesController::class, 'store']);
Route::get('editdis/{id}',[DiseasesController::class, 'edit']);
Route::post('updatedis',[DiseasesController::class, 'update'])->name('updatedis');
Route::get('deletedis/{id}',[DiseasesController::class, 'delete']);

//promotions routes
Route::get('indexpro', [PromotionsController::class, 'index']);
Route::post('storepro',[PromotionsController::class, 'store']);
Route::get('editpro/{id}',[PromotionsController::class, 'edit']);
Route::post('updatepro',[PromotionsController::class, 'update'])->name('updatepro');
Route::get('deletepro/{id}',[PromotionsController::class, 'delete']);

//doctor_specialites routes
Route::get('indexdoc', [DoctorSpecialitiesController::class, 'index']);
Route::post('storedoc',[DoctorSpecialitiesController::class, 'store']);
Route::get('editdoc/{id}',[DoctorSpecialitiesController::class, 'edit']);
Route::post('updatedoc',[DoctorSpecialitiesController::class, 'update'])->name('updatedoc');
Route::get('deletedoc/{id}',[DoctorSpecialitiesController::class, 'delete']);

//keys routes

Route::get('indexkey', [KeysController::class, 'index']);
Route::post('storekey',[KeysController::class, 'store']);
Route::get('editkey/{id}',[KeysController::class, 'edit']);
Route::post('updatekey',[KeysController::class, 'update'])->name('updatekey');
Route::get('deletekey/{id}',[KeysController::class, 'delete']);
