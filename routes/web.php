<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StorageController;
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
    return view('welcome');
});
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('login.index');
Route::post('/admin/login', [AdminController::class, 'login'])->name('login');
Route::get('/register', function () {
    return view('admin.register');
})->name('register.index');
Route::post('/register', [AdminController::class, 'register'])->name('register');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::group(['prefix' => '/furniture'], function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/category/{id}', [HomepageController::class, 'productOfCategory'])->name('furniture.category.detail');
    Route::get('/category/{id}/product/{product_id}', [ProductController::class, 'productDetail'])->name('cate.product.detail');
});
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/about-us', [HomepageController::class, 'aboutUs'])->name('home.about');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::group(['prefix' => '/manager'], function () {
        Route::get('/get-info', [AdminController::class, 'getInfo'])->name('admin.getInfo');
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::get('/details/{admin}', [AdminController::class, 'show'])->name('admin.show');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::delete('/delete/{admin}', [AdminController::class, 'destroy'])->name('admin.delete');
        Route::post('/update/{admin}', [AdminController::class, 'update'])->name('admin.update');
    });
    Route::group(['prefix' => '/role'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('/create', [RoleController::class, 'create'])->name('role.create');
        Route::get('/details/{role}', [RoleController::class, 'show'])->name('role.show');
        Route::post('/store', [RoleController::class, 'store'])->name('role.store');
        Route::delete('/delete/{role}', [RoleController::class, 'destroy'])->name('role.delete');
        Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/update/{role}', [RoleController::class, 'update'])->name('role.update');
    });

    Route::group(['prefix' => '/permission'], function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
    });

    Route::group(['prefix' => '/promotion'], function () {
        Route::get('/', [PromotionController::class, 'index'])->name('promotion.index');
        Route::get('/create', [PromotionController::class, 'create'])->name('promotion.create');
        Route::post('/store', [PromotionController::class, 'store'])->name('promotion.store');
        Route::delete('/delete/{promotion}', [PromotionController::class, 'destroy'])->name('promotion.delete');
        Route::get('/edit/{promotion}', [PromotionController::class, 'edit'])->name('promotion.edit');
        Route::post('/update/{promotion}', [PromotionController::class, 'update'])->name('promotion.update');
    });
    Route::group(['prefix' => '/category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('/details/{category}', [CategoryController::class, 'show'])->name('category.show');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    });
    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/details/{product}', [ProductController::class, 'show'])->name('product.show');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::post('/search', [ProductController::class, 'search'])->name('product.search');
        Route::get('/list-products', [ProductController::class, 'list'])->name('products');
    });
    Route::group(['prefix' => '/storage'], function () {
        Route::get('/', [StorageController::class, 'index'])->name('storage.index');
        Route::get('/create', [StorageController::class, 'create'])->name('storage.create');
        Route::post('/store', [StorageController::class, 'store'])->name('storage.store');
    });
    Route::group(['prefix' => '/order'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/create', [OrderController::class, 'create'])->name('order.create');
        Route::get('/details/{order}', [OrderController::class, 'show'])->name('order.show');
        Route::delete('/delete/{order}', [OrderController::class, 'destroy'])->name('order.delete');
        Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('order.edit');
        Route::post('/update/{order}', [OrderController::class, 'update'])->name('order.update');
    });
});
