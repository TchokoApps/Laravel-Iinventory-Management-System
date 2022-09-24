<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\HomeSlideController;
use Illuminate\Support\Facades\Artisan;
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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(HomeSlideController::class)->prefix('frontend')->group(function () {
    Route::get('/home/slide/edit-form', 'editForm')->name('frontend.home.slide.edit.form');
    Route::post('/home/slide/edit', 'edit')->name('frontend.home.slide.edit');
});

Route::controller(AboutController::class)->prefix('frontend')->group(function () {
    Route::get('/about/edit-form', 'editForm')->name('frontend.about.edit.form');
    Route::post('/about/edit', 'edit')->name('frontend.about.edit');
});

Route::controller(BackendController::class)->prefix('backend')->group(function () {
    Route::get('/', 'index')->name('backend.index');
    Route::get('/index', 'index')->name('backend.index');
    Route::get('/logout', 'destroy')->name('backend.logout');
    Route::get('/profile/view', 'viewProfile')->name('backend.profile.view');
    Route::get('/profile/edit', 'editProfile')->name('backend.profile.edit');
    Route::post('/profile/edit', 'storeProfile')->name('backend.store.profile');
    Route::get('/change-password', 'changePassword')->name('backend.change.password');
    Route::post('/change-password', 'updatePassword')->name('backend.update.password');

});

Route::controller(SupplierController::class)->prefix('backend/supplier')->group(function () {
    Route::get('/view', 'viewSupplier')->name('backend.supplier.view');
    Route::get('/create-form', 'createSupplierForm')->name('backend.supplier.create.form');
    Route::post('/create', 'createSupplier')->name('backend.supplier.create');
    Route::get('/update-form/{id}', 'updateSupplierForm')->name('backend.supplier.update.form');
    Route::post('/update', 'updateSupplier')->name('backend.supplier.update');
    Route::get('/delete/{id}', 'deleteSupplier')->name('backend.supplier.delete');

});

Route::controller(CustomerController::class)->prefix('backend/customer')->group(function () {
    Route::get('/index', 'index')->name('backend.customer.index');
    Route::get('/create-form', 'createForm')->name('backend.customer.create.form');
    Route::post('/create', 'create')->name('backend.customer.create');
    Route::get('/update-form/{id}', 'updateForm')->name('backend.customer.update.form');
    Route::post('/update', 'update')->name('backend.customer.update');
    Route::get('/delete/{id}', 'destroy')->name('backend.customer.delete');
});

Route::controller(UnitController::class)->prefix('backend/unit')->group(function () {
    Route::get('/index', 'index')->name('backend.unit.index');
    Route::get('/create', 'create')->name('backend.unit.create');
    Route::post('/store', 'store')->name('backend.unit.store');
    Route::get('/edit/{id}', 'edit')->name('backend.unit.edit');
    Route::post('/update', 'update')->name('backend.unit.update');
    Route::get('/destroy/{id}', 'destroy')->name('backend.unit.destroy');
});

Route::controller(CategoryController::class)->prefix('backend/category')->group(function () {
    Route::get('/index', 'index')->name('backend.category.index');
    Route::get('/create', 'create')->name('backend.category.create');
    Route::post('/store', 'store')->name('backend.category.store');
    Route::get('/edit/{id}', 'edit')->name('backend.category.edit');
    Route::post('/update', 'update')->name('backend.category.update');
    Route::get('/destroy/{id}', 'destroy')->name('backend.category.destroy');
});

Route::controller(ProductController::class)->prefix('backend/product')->group(function () {
    Route::get('/index', 'index')->name('backend.product.index');
    Route::get('/create', 'create')->name('backend.product.create');
    Route::post('/store', 'store')->name('backend.product.store');
    Route::get('/edit/{id}', 'edit')->name('backend.product.edit');
    Route::post('/update', 'update')->name('backend.product.update');
    Route::get('/destroy/{id}', 'destroy')->name('backend.product.destroy');
});

Route::controller(PurchaseController::class)->prefix('backend/purchase')->group(function () {
    Route::get('/index', 'index')->name('backend.purchase.index');
    Route::get('/create-form', 'createForm')->name('backend.purchase.create.form');
    Route::post('/create', 'create')->name('backend.purchase.create');
    Route::get('/update-form/{id}', 'updateForm')->name('backend.purchase.update.form');
    Route::post('/update', 'update')->name('backend.purchase.update');
    Route::get('/destroy/{id}', 'destroy')->name('backend.purchase.destroy');
});


Route::get('reset', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});

require __DIR__ . '/auth.php';
