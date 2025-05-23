<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\LaundromatRegisterController;
use App\Http\Controllers\Auth\LaundromatLoginController;
use App\Http\Controllers\LaundromatController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\LaundromatRegisterController;
use App\Http\Controllers\Auth\LaundromatLoginController;
use App\Http\Controllers\Auth\CustomerAuthController;

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Edit User
Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit');
// Update User (after editing)
Route::put('/admin/user/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update');
// Delete User
Route::delete('/admin/user/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');



Route::get('register', [UserRegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserRegisterController::class, 'register']);

Route::get('login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserLoginController::class, 'login']);
Route::post('logout', [UserLoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->get('/dashboard', function () {
    return view('user.dashboard');
});


//Laundromat_auth
Route::get('laundromat/register', [LaundromatRegisterController::class, 'showRegisterForm'])->name('laundromat.register');
Route::post('laundromat/register', [LaundromatRegisterController::class, 'register'])->name('laundromat.register.submit');
Route::get('laundromat/login', [LaundromatLoginController::class, 'showLoginForm'])->name('laundromat.login');
Route::post('laundromat/login', [LaundromatLoginController::class, 'login'])->name('laundromat.login.submit');
Route::post('laundromat/logout', [LaundromatLoginController::class, 'logout'])->name('laundromat.logout');


//All laundromat Routes
Route::middleware(['auth:laundromat'])->prefix('laundromat')->name('laundromat.')->group(function () {
    Route::get('/dashboard', [LaundromatController::class, 'index'])->name('dashboard');
    Route::post('/order/{id}/accept', [LaundromatController::class, 'acceptOrder'])->name('acceptOrder');
    Route::post('/order/{id}/reject', [LaundromatController::class, 'rejectOrder'])->name('rejectOrder');
    Route::get('/processing-orders', [LaundromatController::class, 'processingOrders'])->name('processingOrders');
    Route::post('/order/{id}/complete', [LaundromatController::class, 'markCompleted'])->name('completeOrder');
    Route::get('/sales-history', [LaundromatController::class, 'salesHistory'])->name('salesHistory');
    Route::get('/edit-profile', [LaundromatController::class, 'editProfile'])->name('editProfile');
    Route::post('/update-profile', [LaundromatController::class, 'updateProfile'])->name('updateProfile');
});


Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('coupons', [AdminController::class, 'coupons'])->name('coupons'); // Display coupons
    Route::post('coupons', [AdminController::class, 'storeCoupon'])->name('coupon.store'); // Add new coupon
});
 Route::delete('/admin/coupon/{id}', [AdminController::class, 'deletecoupon'])->name('admin.coupon.delete');
 
 
Route::get('customer/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
Route::post('customer/register', [CustomerAuthController::class, 'register']);

Route::get('customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::post('customer/login', [CustomerAuthController::class, 'login']);

Route::get('customer/dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');
Route::get('customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');



#customer
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('/customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
// Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');

Route::match(['put', 'patch'], '/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');


//order routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/laundromats/{id}/details', [OrderController::class, 'getLaundromatDetails'])->name('laundromats.details');
//
