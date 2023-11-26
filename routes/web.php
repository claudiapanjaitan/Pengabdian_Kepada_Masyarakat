<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProdukController;
use App\Http\Controllers\WebController;

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

Route::redirect('/', 'home', 301);
Route::get('home', [WebController::class,'home'])->name('home');
Route::prefix('auth/')->name('auth.')->group(function(){
    Route::get('index', [AuthController::class,'index'])->name('index');
    Route::post('register', [AuthController::class,'register'])->name('register');
    Route::post('forgot', [AuthController::class,'forgot'])->name('forgot');
    Route::get('reset/{token}', [AuthController::class,'reset'])->name('reset');
    Route::post('reset', [AuthController::class,'do_reset'])->name('do_reset');
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
});
Route::prefix('user/')->name('user.')->group(function(){
    Route::resource('ulasan', UlasanController::class);
    Route::get('ulos', [AccountController::class,'ulos'])->name('ulos');
    Route::get('akun', [AccountController::class,'akun'])->name('akun');
    Route::get('settings', [AccountController::class,'settings'])->name('settings');
    Route::get('profile', [AccountController::class,'profile'])->name('profile');
    Route::patch('editProfile/{profile}', [AccountController::class,'editProfile'])->name('editProfile');
    Route::get('order', [AccountController::class,'order'])->name('order');
    Route::get('pembayaran', [AccountController::class,'pembayaran'])->name('pembayaran');
    Route::get('confirmpayment', [AccountController::class,'confirmpayment'])->name('confirmpayment');
    Route::get('order_view/{id}', [AccountController::class,'order_view'])->name('order_view');
    Route::get('checkout/{id}', [CheckoutController::class,'index'])->name('checkout');
    Route::post('checkout/{id}', [CheckoutController::class,'store'])->name('checkout.store');
});
Route::prefix('provinsi/')->name('provinsi.')->group(function(){
    Route::get('get_kabupaten', [ProvinceController::class,'get_kabupaten'])->name('get_kabupaten');
    Route::post('get_kurir', [ProvinceController::class,'get_kurir'])->name('get_kurir');
    Route::post('get_biaya', [ProvinceController::class,'get_biaya'])->name('get_biaya');
});
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::patch('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::delete('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::resource('/produk', ProdukController::class);