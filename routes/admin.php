<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\AdminController;
use \App\Http\Controllers\admin\PlanController;
use \App\Http\Controllers\admin\CompanyController;
use \App\Http\Controllers\admin\AdvertesmentController;
use \App\Http\Controllers\admin\UserController;
Route::group(['prefix' => 'admin'], function () {
    // Admin Login
    Route::match(['post', 'get'], '/', [AdminController::class, 'login'])->name('admin_login');
    Route::match(['post', 'get'], 'login', [AdminController::class, 'login'])->name('admin_login');
    // Admin Dashboard
    Route::group(['middleware' => 'Admin'], function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('dashboard', 'dashboard');
            // update admin password
            Route::match(['post', 'get'], 'update_admin_password', 'update_admin_password');
            // check Admin Password
            Route::post('check_admin_password', 'check_admin_password');
            // Update Admin Details
            Route::match(['post', 'get'], 'update_admin_details', 'update_admin_details');
            // Admin Logout
            Route::get('logout', 'logout')->name('admin_logout');
        });

        //////////////////////////// Start Plans /////////////////
        ///
        Route::controller(PlanController::class)->group(function (){
            Route::get('plans','index');
            Route::match(['post','get'],'plan/store','store');
            Route::match(['post','get'],'plan/update/{id}','update');
            Route::post('plan/delete/{id}','delete');
        });
        ///////////////////////////////// start companies ///////////
        ///
        Route::controller(CompanyController::class)->group(function (){
            Route::get('companies','index');
            Route::match(['post','get'],'company/store','store');
            Route::match(['post','get'],'company/update/{id}','update');
            Route::post('company/delete/{id}','delete');
        });
        //////////////////////////////// Start Advertesment //////////
        ///
        Route::controller(AdvertesmentController::class)->group(function (){
            Route::get('advertisements','index');
            Route::match(['post','get'],'advertisement/store','store');
            Route::match(['post','get'],'advertisement/update/{id}','update');
            Route::post('advertisement/delete/{id}','delete');
        });
        /////////////////////////////// Start Users ////////////////
        ///
        Route::controller(UserController::class)->group(function (){
           Route::get('users','index');
            Route::match(['post','get'],'user/store','store');
            Route::match(['post','get'],'user/update/{id}','update');
            Route::post('user/delete/{id}','delete');
        });
    });
});
