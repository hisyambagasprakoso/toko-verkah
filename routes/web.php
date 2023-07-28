<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerchantLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;
// use App\Http\Middleware\Authenticate;

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

// Route::get('/', function () {
//     return view('signin');
// });

// login page for admins
// Route::group(['middleware' => 'web'], function() {
// Route::auth();

// });

//
// admin page

Route::group(['middleware' => 'admin'], function(){
Route::auth();
Route::get('admin', [LoginController::class, 'getLogin'])->name('get.login');
Route::post('admin', [LoginController::class, 'login'])->name('login.store');
Route::get('welcome', [AdminController::class, 'getDashboard']);
Route::get('logout-adm', [LoginController::class,'logout'])->name('admin.logout');

Route::get('merchant', [AdminController::class, 'getMerchants'])->name('merchant.getMerchants');
Route::post('store-merchant', [AdminController::class, 'store'])->name('merchant.store');
Route::post('update-merchant', [AdminController::class, 'update'])->name('merchant.update');
Route::post('edit-merchant', [AdminController::class, 'edit'])->name('merchant.edit');
Route::post('delete-merchant', [AdminController::class, 'destroy'])->name('merchant.destroy');
Route::get('all-transaction', [TransactionController::class, 'getAllTransaction'])->name('get.transaction');

});


// login page for merchants
Route::group(['middleware' => 'web'], function() {
Auth::routes();
Route::get('login-merchant', [MerchantLoginController::class,'getLogin'])->name('get.merchant.login');
Route::post('login-merchant', [MerchantLoginController::class,'login'])->name('merchant.login.store');
Route::post('logout-merchant', [MerchantLoginController::class,'getLogout'])->name('merchant.logout');
Route::get('transaction', [TransactionController::class, 'getTransaction'])->name('get.transaction');

});
    /**
     * Logout Routes
     */

// transaction page for merchants


// check out page
Route::get('checkout', [CheckoutController::class, 'index'])->name('get.checkout');
Route::post('create-checkout', [CheckoutController::class, 'addTransaction'])->name('checkout.create');
