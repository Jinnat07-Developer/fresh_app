<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopgridController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\UserController;


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

Route::get('/', [ShopgridController::class, 'index'])->name('home');
Route::get('/product-category/{id}', [ShopgridController::class, 'category'])->name('product-category');
Route::get('/product-subCategory/{id}', [ShopgridController::class, 'subCategory'])->name('product-subCategory');
Route::get('/product-detail/{id}', [ShopgridController::class, 'product'])->name('product-detail');
Route::get('/show/cart', [CartController::class, 'index'])->name('show.cart');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/product/checkout', [CheckoutController::class, 'index'])->name('product.checkout');
Route::post('/confirm-order', [CheckoutController::class, 'newOrder'])->name('confirm-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

Route::get('/customer-login', [CustomerAuthController::class, 'index'])->name('customer-login');
Route::get('/customer-register', [CustomerAuthController::class, 'register'])->name('customer-register');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer-login');
Route::post('/customer-register', [CustomerAuthController::class, 'newCustomer'])->name('customer-register');
Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer-logout');


Route::get('/page-shipping', [PageController::class, 'index'])->name('page-shipping');
Route::get('/page-return', [PageController::class, 'returnPolicy'])->name('page-return');
Route::get('/page-privacy', [PageController::class, 'privacyPolicy'])->name('page-privacy');

Route::middleware(['customer'])->group(function () {
    Route::get('/customer-dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer-dashboard');
    Route::get('/customer/change-password', [CustomerAuthController::class, 'changePassword'])->name('customer.change-password');
    Route::post('/customer/update-password', [CustomerAuthController::class, 'updatePassword'])->name('customer.update-password');
    Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer-logout');
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function (){
    Route::get('/home',[DashboardController::class, 'index'])->name('home');

    Route::resource('courier',CourierController::class);
    Route::resource('user',UserController::class);

    Route::get('/category/add',[CategoryController::class, 'index'])->name('category.add');
    Route::get('/category/manage',[CategoryController::class, 'manage'])->name('category.manage');
    Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/subCategory/add',[SubCategoryController::class, 'index'])->name('subCategory.add');
    Route::get('/subCategory/manage',[SubCategoryController::class, 'manage'])->name('subCategory.manage');
    Route::post('/subCategory/store',[SubCategoryController::class, 'store'])->name('subCategory.store');
    Route::get('/subCategory/edit/{id}',[SubCategoryController::class, 'edit'])->name('subCategory.edit');
    Route::post('/subCategory/update/{id}',[SubCategoryController::class, 'update'])->name('subCategory.update');
    Route::get('/subCategory/delete/{id}',[SubCategoryController::class, 'delete'])->name('subCategory.delete');

    Route::get('/brand/add',[BrandController::class, 'index'])->name('brand.add');
    Route::get('/brand/manage',[BrandController::class, 'manage'])->name('brand.manage');
    Route::post('/brand/store',[BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}',[BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class, 'delete'])->name('brand.delete');

    Route::get('/unit/add',[UnitController::class, 'index'])->name('unit.add');
    Route::get('/unit/manage',[UnitController::class, 'manage'])->name('unit.manage');
    Route::post('/unit/store',[UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/edit/{id}',[UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}',[UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/delete/{id}',[UnitController::class, 'delete'])->name('unit.delete');

    Route::get('/product/add',[ProductController::class, 'index'])->name('product.add');
    Route::get('/get-subCategory-by-category',[ProductController::class, 'getSubCategoryByCategory'])->name('get-subCategory-by-category');
    Route::get('/product/manage',[ProductController::class, 'manage'])->name('product.manage');
    Route::post('/product/store',[ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/detail/{id}',[ProductController::class, 'detail'])->name('product.detail');
    Route::post('/product/update/{id}',[ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');

    Route::get('/customer/manage',[CustomerController::class, 'manage'])->name('customer.manage');
    Route::get('/customer/edit/{id}',[CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update/{id}',[CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/delete/{id}',[CustomerController::class, 'delete'])->name('customer.delete');

    Route::get('/order/manage',[OrderController::class, 'manage'])->name('order.manage');
    Route::get('/admin-order/edit/{id}',[OrderController::class, 'edit'])->name('admin-order.edit');
    Route::get('/admin-order/detail/{id}',[OrderController::class, 'detail'])->name('admin-order.detail');
    Route::get('/admin-order/show-invoice/{id}',[OrderController::class, 'showInvoice'])->name('admin-order.show-invoice');
    Route::get('/admin-order/download-invoice/{id}',[OrderController::class, 'downloadInvoice'])->name('admin-order.download-invoice');
    Route::post('/admin-order/update/{id}',[OrderController::class, 'update'])->name('admin-order.update');
    Route::get('/admin-order/delete/{id}',[OrderController::class, 'delete'])->name('admin-order.delete');


});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END






