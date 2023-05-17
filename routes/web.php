<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Admin\AdminCategoryController;
use Admin\AdminUserController;
use Admin\AdminProductController;
use Admin\AdminProductGalleryController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/caregories', [CategoryController::class, 'index'])->name('categories');
Route::get('/caregories/{id}', [CategoryController::class, 'detail'])->name('categories-detail');
Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [DetailController::class, 'add'])->name('detail-add');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');
Route::get('/success', [CartController::class, 'success'])->name('success');

Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/products', [DashboardProductController::class, 'index'])->name('dashboard-product');
Route::get('/dashboard/products/create', [DashboardProductController::class, 'create'])->name('dashboard-product-create');
Route::get('/dashboard/products/{id}', [DashboardProductController::class, 'details'])->name('dashboard-product-detail');

Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transaction-detail');

Route::get('/dashboard/settings', [DashboardSettingController::class, 'store'])->name('dashboard-setting-store');
Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])->name('dashboard-setting-account');


//middleware(['auth','admin'])
Route::prefix('admin')
    ->group(function() {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('category', (AdminCategoryController::class));
        Route::resource('user', (AdminUserController::class));
        Route::resource('product', (AdminProductController::class));
        Route::resource('product-gallery', (AdminProductGalleryController::class));
    });

Auth::routes();
