<?php

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
    return view('auth.login');
})->name('/');
Route::post('/login',[\App\Http\Controllers\web\LoginController::class,'login']);


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/start',[\App\Http\Controllers\web\StartController::class,'start'])->name('start');
    Route::get('/adm/dashboard',\App\Http\Livewire\Adm\Dashboard::class)->name('adm.dashboard');

});
