<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\ProdukController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});
Route::prefix('admin/')->name('admin.')->group(function(){
    Route::resource('/produk', ProdukController::class);
    Route::patch('/produk/{produk}/publish', [ProdukController::class, 'published'])->name('produk.published');
    Route::patch('/produk/{produk}/unpublish', [ProdukController::class, 'unpublished'])->name('produk.unpublished');
});
Route::get('login', [AuthController::class,'adminIndex'])->name('login');
Route::prefix('admin/auth/')->name('admin.auth.')->group(function(){
    
    Route::post('login', [AuthController::class,'adminLogin'])->name('login');
    Route::get('logout', [AuthController::class,'adminLogout'])->name('logout');
});
    
