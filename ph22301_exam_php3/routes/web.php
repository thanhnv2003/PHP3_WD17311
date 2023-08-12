<?php

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
    return redirect()->route('list');
});
Route::match(['GET', 'POST'],'upload', [\App\Http\Controllers\UploadController::class, 'add'])->name('upload');
Route::get('list', [\App\Http\Controllers\UploadController::class,'list'])->name('list');
Route::match(['GET', 'POST'],'edit/{id}', [\App\Http\Controllers\UploadController::class, 'edit'])->name('edit');
Route::get('delete/{id}', [\App\Http\Controllers\UploadController::class, 'delete'])->name('delete');

