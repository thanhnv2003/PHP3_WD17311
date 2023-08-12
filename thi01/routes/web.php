<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
//    return view('welcome');
    return redirect()->route('list');
});

Route::get('list', [StudentController::class, 'list'])->name('list');
Route::match(['GET', 'POST'], 'add', [StudentController::class, 'add'])->name('add');
Route::match(['GET', 'POST'], 'edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::get('delete/{id}', [StudentController::class, 'delete'])->name('delete');
