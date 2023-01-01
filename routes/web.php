<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialitiesController;
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

Route::get('inputspe', [SpecialitiesController::class, 'index']);
Route::post('store',[SpecialitiesController::class, 'store']);