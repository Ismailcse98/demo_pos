<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseOrderController;

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

Route::group(['middleware'=>['auth']],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::resource('/units', UnitController::class);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/purchases', PurchaseController::class);
    Route::resource('/purchases-order', PurchaseOrderController::class);
    Route::get('/printpriview/{id}',[PurchaseOrderController::class,'print']);
    
});

Auth::routes();
