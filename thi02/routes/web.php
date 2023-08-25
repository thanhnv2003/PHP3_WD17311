<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
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
//    return view('welcome');
    return redirect()->route('list');
});
Route::get('list', [StudentController::class, 'list'])->name('list');
Route::match(['GET', 'POST'], 'add', [StudentController::class, 'add'])->name('add');
Route::match(['GET', 'POST'], 'edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::get('delelte/{id}', [StudentController::class, 'delete'])->name('delete');
