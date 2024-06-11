<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PifupdateController;

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



Auth::routes(['register' => false]);

Route::post('/login', [LoginController::class, 'post_login'])->name('login');
Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}/{email}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('main');
    Route::get('home', [HomeController::class, 'index'])->name('main');
    Route::get('master', function () {
        return view('main');
    });
    Route::get('listuser', function () {
        return view('user.listuser');
    });
    Route::get('edituser', function () {
        return view('user.editUser');
    });
    Route::get('table', function () {
        return view('datatable');
    });
    Route::get('createuser' , function(){
        return view('user.createUser');
    });

    Route::middleware(['authadmin'])->group(function () {
        Route::get('listuser', function () {
            return view('user.listuser');
        });
        Route::get('edituser', function () {
            return view('user.edituser');
        });
        Route::get('table', function () {
            return view('datatable');
        });
        Route::get('createuser', function () {
            return view('user.createuser');
        });
        Route::get('users', [UserController::class, 'index'])->name('users');
        Route::get('users/getuserdatatable', [UserController::class, 'getuserdatatable'])->name('getuserdatatable');
        Route::get('users/edituser/{id}', [UserController::class, 'edituser']);
        Route::get('users/deleteuser/{id}', [UserController::class, 'deleteuser']);
        Route::post('users/insertuser', [UserController::class, 'insertuser']);
        Route::post('users/updateuser', [UserController::class, 'updateuser']);
    });

    Route::get('change_password/{id}', [UserController::class, 'changeuser_password'])->name('change_password');
    Route::post('update_password', [UserController::class, 'updatepassword'])->name('update_password');

    Route::get('product_detail', [ProductController::class, 'index'])->name('product_info');
    Route::get('product/getdatatablet', [ProductController::class, 'getdatatablet'])->name('getdatatablet');
    Route::get('product/tosevendigit/{sku_code}', [ProductController::class, 'tosevendigit'])->name('tosevendigit');
    Route::get('product/getdatatablet7digit', [ProductController::class, 'getdatatablet7digit'])->name('getdatatablet7digit');
    Route::get('product/detail/{sku_id}', [ProductController::class, 'product_detail'])->name('product_detail');
    Route::get('product/tosevendigit/product/log', [ProductController::class, 'getlogproductdatatable'])->name('getlogproductdatatable');
    Route::get('product/tosevendigit/product/productlog/{sku_id}',[ProductController::class,'product_log'])->name('getproductlog');
    Route::get('product/export_excel', [ProductController::class, 'product_export_excel'])->name('product_export_excel');


    Route::get('product_dinamic', [ProductController::class, 'index_dinamic'])->name('product_dinamic');
    Route::get('product/getdatatablet_dinamic', [ProductController::class, 'getdatatablet_dinamic'])->name('getdatatablet_dinamic');

    Route::get('product_dinamic/fillter_data', [ProductController::class, 'fillter_data'])->name('fillter_data');



});


Route::get('update_oracle_to_mysql', [PifupdateController::class, 'update_oracle_to_mysql'])->name('update_data_oracle_to_mysql');
