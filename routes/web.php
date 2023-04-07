<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LophocController;
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

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
});

Route::group(['prefix' => 'lophoc'], function () {
    Route::get('/', [LophocController::class, 'index'])->name('lophoc.index');
    Route::get('/create', [LophocController::class, 'create'])->name('lophoc.create');
    Route::post('/store', [LophocController::class, 'store'])->name('lophoc.store');
    Route::get('/edit/{id}', [LophocController::class, 'edit'])->name('lophoc.edit');
    Route::put('/update/{id}', [LophocController::class, 'update'])->name('lophoc.update');
    Route::delete('/destroy/{id}', [LophocController::class, 'destroy'])->name('lophoc.destroy');
});