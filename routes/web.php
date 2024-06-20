<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\website\AdvertisementController;
use \App\Http\Controllers\website\UserController;
use \App\Http\Controllers\website\CompanyController;
use \App\Http\Controllers\website\FrontController;

Route::get('/', function () {
    return view('website.index');
});

/////////////////////////// User Controller //////////////////////
///
Route::controller(UserController::class)->group(function () {
    Route::match(['post', 'get'], 'login', 'login')->name('login');
    Route::match(['post', 'get'], 'register', 'register');
    Route::match(['post', 'get'], 'forget-password', 'forget_password');
});
/////////////////////// Company Controller //////////////////////
///
Route::controller(CompanyController::class)->group(function () {
    Route::post('company/register', 'register');
    Route::get('company/confirm/{code}', 'CompanyConfirm');
    Route::post('company/login', 'login')->name('company_login');
    Route::group(['middleware' => 'company'], function () {
        Route::get('company/dashboard', 'index');
        Route::post('company/update_info', 'update_info');
        Route::match(['post', 'get'], 'company/add-job', 'add_job');
        Route::get('company/jobs', 'jobs');
        Route::get('company/job/delete/{id}','delete_job');
    });
    Route::match(['post', 'get'], 'company/change-password', 'change_password');
    Route::get('company/plan', 'plans');
    Route::get('company/chat', 'chat');
    Route::get('company/job-users', 'job_users'); // رابط المتقدمين للوظيفة
    Route::get('company/logout', 'logout');
});

Route::controller(AdvertisementController::class)->group(function () {
    Route::get('jobs', 'index');
    Route::get('job', 'job_details');
    Route::get('talents', 'talents');
    Route::get('talent-details', 'talent_details');
});

Route::controller(FrontController::class)->group(function () {
    Route::get('contact', 'contact');
    Route::get('faqs', 'faqs');
    Route::post('add_contact_message', 'add_contact_message');
});

include 'admin.php';
