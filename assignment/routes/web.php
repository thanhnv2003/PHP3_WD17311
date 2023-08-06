<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Admin\ImageProductController;
use App\Http\Controllers\Admin\PromotionsController;
use App\Http\Controllers\Admin\BannersController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ProductCliController;
use App\Http\Controllers\Client\CartController;
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

Route::get('/', [ClientController::class, 'index'])->name('index');
Route::get('product/{id}', [ProductCliController::class, 'detail'])->name('product_detail');
Route::get('shop', [ProductCliController::class, 'shop'])->name('product_shop');
Route::get('pages', [ClientController::class, 'page_404'])->name('page_404');
Route::get('blog', [ClientController::class, 'blog_page'])->name('blog_page');
Route::get('contact', [ClientController::class, 'contact_page'])->name('contact_page');


Route::match(['GET', 'POST'],'login', [LoginController::class, 'login'])->name('login');
Route::post('register', [LoginController::class,'register'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::match(['GET', 'POST'],'my-account', [LoginController::class, 'myAccount'])->name('my_account');
Route::post('update-account', [LoginController::class,'updateAddress'])->name('update_address');

Route::match(['GET', 'POST'],'forgot-password', [LoginController::class, 'forgot'])->name('forgot');
Route::match(['GET','POST'], 'reset-password/{token}', [LoginController::class, 'resetPass'])->name('reset-pass');

Route::post('add-to-cart', [CartController::class, 'add'])->name('add_to_cart');
Route::get('cart-delete/{id}', [CartController::class, 'delete'])->name('cart_delete');
Route::get('view-cart', [CartController::class, 'viewCart'])->name('view_cart');
Route::match(['GET','POST'],'checkout', [CartController::class, 'checkout'])->name('checkout');
Route::match(['GET','POST'],'coupon', [CartController::class, 'checkCoupon'])->name('coupon');

Route::prefix('wp-admin')->middleware(['auth','admin'])->group(function (){
    Route::get('/', [HomeController::class,'index'])->name('admin');

    Route::get('categories', [CategoriesController::class, 'list'])->name('cate.list');
    Route::match(['GET', 'POST'],'categories/add', [CategoriesController::class, 'add'])->name('cate.add');
    Route::match(['GET', 'POST'],'categories/edit/{id}', [CategoriesController::class, 'edit'])->name('cate.edit');
    Route::get('categories/delete/{id}', [CategoriesController::class, 'delete'])->name('cate.delete');

    Route::get('brands', [BrandsController::class, 'list'])->name('brand.list');
    Route::match(['GET', 'POST'],'brands/add', [BrandsController::class, 'add'])->name('brand.add');
    Route::match(['GET', 'POST'],'brands/edit/{id}', [BrandsController::class, 'edit'])->name('brand.edit');
    Route::get('brands/delete/{id}', [BrandsController::class, 'delete'])->name('brand.delete');

    Route::get('products', [ProductsController::class, 'list'])->name('pro.list');
    Route::match(['GET', 'POST'],'products/add', [ProductsController::class, 'add'])->name('pro.add');
    Route::match(['GET', 'POST'],'products/edit/{id}', [ProductsController::class, 'edit'])->name('pro.edit');
    Route::get('products/delete/{id}', [ProductsController::class, 'delete'])->name('pro.delete');
    Route::post('ckeditor/image_upload', [EditorController::class, 'upload'])->name('upload');

    Route::get('image-product/{id}', [ImageProductController::class, 'list'])->name('image.list');
    Route::match(['GET', 'POST'],'image-product/edit/{id}/{product}', [ImageProductController::class, 'edit'])->name('image.edit');

    Route::get('promotions', [PromotionsController::class, 'list'])->name('promo.list');
    Route::match(['GET', 'POST'],'promotions/add', [PromotionsController::class, 'add'])->name('promo.add');
    Route::match(['GET', 'POST'],'promotions/edit/{id}', [PromotionsController::class, 'edit'])->name('promo.edit');
    Route::get('promotions/delete/{id}', [PromotionsController::class, 'delete'])->name('promo.delete');

    Route::get('banners', [BannersController::class, 'list'])->name('banner.list');
    Route::match(['GET', 'POST'],'banners/edit/{id}', [BannersController::class, 'edit'])->name('banner.edit');
    Route::get('banners/delete/{id}', [BannersController::class, 'delete'])->name('banner.delete');
});


