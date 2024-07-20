<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\website\AdvertisementController;
use \App\Http\Controllers\website\UserController;
use \App\Http\Controllers\website\CompanyController;
use \App\Http\Controllers\website\FrontController;
use \App\Http\Controllers\website\jobOfferController;
use \App\Livewire\Chat\Createchat;

Route::get('/', function () {
    return view('website.index');
});

/////////////////////////// User Controller //////////////////////
///
Route::controller(UserController::class)->group(function () {
    Route::match(['post', 'get'], 'login', 'login')->name('login');
    Route::get('register', 'register');
    Route::post('user/register', 'register');
    Route::get('user/confirm/{code}', 'UserConfirm');
    /////// Forget Password
    ///
    Route::match(['post', 'get'], 'forget-password', 'forget_password');
    Route::match(['post', 'get'], 'user/change-forget-password/{code}', 'change_forget_password');
    Route::post('user/update_forget_password', 'update_forget_password');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('user/dashboard', 'index');
        Route::post('user/update_info', 'update_info');
        Route::match(['get', 'post'], 'user/update', 'update_data');
        Route::get('user/alerts', 'alerts');
        Route::match(['post', 'get'], 'user/change-password', 'change_password');
        Route::get('user/logout', 'logout');
        Route::get('user/alert/delete/{id}', 'delete_alert');
    });

    Route::match(['post', 'get'], 'forget-password', 'forget_password');
});
/////////////////////// Company Controller //////////////////////
///
Route::controller(CompanyController::class)->group(function () {

    Route::post('company/register', 'register');
    Route::get('company/confirm/{code}', 'CompanyConfirm');
    Route::post('company/login', 'login')->name('company_login');
    //////////Forget Password
    ///
    Route::match(['post', 'get'], 'company/forget-password', 'forget_password');
    Route::match(['post', 'get'], 'company/change-forget-password/{code}', 'change_forget_password');
    Route::post('company/update_forget_password', 'update_forget_password');

    Route::group(['middleware' => 'company'], function () {
        Route::get('company/dashboard', 'index');
        Route::post('company/update_info', 'update_info');
        Route::match(['post', 'get'], 'company/add-job', 'add_job');
        Route::get('company/jobs', 'jobs');
        Route::match(['get', 'post'], 'company/job/{id}', 'update_job');
        Route::get('company/job/delete/{id}', 'delete_job');
        Route::match(['post', 'get'], 'company/change-password', 'change_password');
        Route::get('company/logout', 'logout');
        Route::get('company/job/offers/{id}', 'talent_offers');
        ///////// Unaccepted offer
        Route::get('company/offer/unaccepted/{id}', 'offer_unaccepted');
        /////////// Start Conversation
        ///
        Route::get('company/start-chat/{username}','start_conversation');

    });

    Route::get('chat-main',\App\Livewire\Chat\Main::class);
    Route::get('company/plan', 'plans');
    Route::get('company/chat', 'chat');
    Route::get('company/job-users', 'job_users'); // رابط المتقدمين للوظيفة


});

Route::controller(AdvertisementController::class)->group(function () {
    Route::get('jobs', 'index');
    Route::get('job/{id}-{slug}', 'job_details');
});

Route::controller(FrontController::class)->group(function () {
    Route::get('contact', 'contact');
    Route::get('faqs', 'faqs');
    Route::get('terms', 'terms');
    Route::post('add_contact_message', 'add_contact_message');
    Route::get('employers', 'employers');
    Route::get('companies/{username}', 'company_details');
    Route::get('talents', 'talents');
    Route::get('talent-details/{username}', 'talent_details');
});

Route::controller(jobOfferController::class)->group(function () {
    Route::post('add-offer', 'add_offer');
});

Route::view('404', 'website.404');

/////////////////////// Start Chat With LiveWire

Route::get('lists', \App\Livewire\Chat\Chatlist::class);
Route::get('create-chat',Createchat::class);
Route::get('counter', \App\Livewire\Counter::class);

include 'admin.php';
