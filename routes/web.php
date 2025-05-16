<?php

use Illuminate\Support\Facades\Route;


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


Route::get('laundromat/register', [LaundromatRegisterController::class, 'showRegisterForm'])->name('laundromat.register');
Route::post('laundromat/register', [LaundromatRegisterController::class, 'register']);
Route::get('laundromat/login', [LaundromatLoginController::class, 'showLoginForm'])->name('laundromat.login');
Route::post('laundromat/login', [LaundromatLoginController::class, 'login']);
Route::post('laundromat/logout', [LaundromatLoginController::class, 'logout'])->name('laundromat.logout');

Route::middleware(['auth:laundromat'])->get('laundromat/dashboard', function () {
    return view('laundromat.dashboard');
})->name('laundromat.dashboard');


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

