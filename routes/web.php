<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportExcellController;

Route::get('/', [ImportExcellController::class, 'index'])->name('excel.index');
Route::post('/', [ImportExcellController::class, 'import'])->name('excel.import');
Route::get('/test', [ImportExcellController::class, 'test'])->name('excel.test');
Route::post('/test', [ImportExcellController::class, 'testimport'])->name('excel.testimport');
Route::get('/chart', [ImportExcellController::class, 'chart'])->name('excel.chart');
