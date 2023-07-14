<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriesController;

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
    return view('client.home');
});
Route::prefix('wp-admin')->group(function (){
    Route::get('/', [HomeController::class,'index'])->name('admin');
    Route::get('categories', [CategoriesController::class, 'list'])->name('cate.list');
    Route::match(['GET', 'POST'],'categories-add', [CategoriesController::class, 'add'])->name('cate.add');
    Route::match(['GET', 'POST'],'categories-edit/{id}', [CategoriesController::class, 'edit'])->name('cate.edit');
});


