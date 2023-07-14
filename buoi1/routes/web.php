<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
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
Route::get('index', [TestController::class, 'index'])->name('index');
Route::post('index', [TestController::class, 'index']);
//Route::get('add', [TestController::class, 'add']);
//Route::post('add', [TestController::class, 'add']);

//chuẩn đặt route
//Route::post('/student/add', [TestController::class, 'index'])->name('route_student_add');

Route::match(['GET','POST'],'add',[TestController::class, 'add'])->name('add');
Route::match(['GET','POST'],'edit/{id}',[TestController::class, 'edit'])->name('edit');
Route::get('delete/{id}', [TestController::class, 'delete'])->name('delete');
