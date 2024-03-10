<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ListKuisController;
use App\Http\Controllers\Admin\ListPertanyaanController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.homepage.index');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kuis/{idKuis}', [HomeController::class, 'kuis'])->name('kuis.kuis');
Route::get('/kuis/{idKuis}/pertanyaan/{idPertanyaan}', [HomeController::class, 'soal'])->name('kuis.soal');
Route::post('/kuis/{idKuis}/pertanyaan/{idPertanyaan}', [HomeController::class, 'proses'])->name('kuis.proses');
Route::get('/kuis/{idKuis}/berhasil', [HomeController::class, 'berhasil'])->name('kuis.berhasil');



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::resource('listKuis', ListKuisController::class);
    Route::resource('listPertanyaan', ListPertanyaanController::class);
});

