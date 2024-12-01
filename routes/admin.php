<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\AdminController;
use \App\Http\Controllers\admin\PlanController;
use \App\Http\Controllers\admin\CompanyController;
use \App\Http\Controllers\admin\AdvertesmentController;
use App\Http\Controllers\admin\BlogController;
use \App\Http\Controllers\admin\UserController;
use \App\Http\Controllers\admin\FaqController;
use \App\Http\Controllers\admin\TermsController;
use \App\Http\Controllers\admin\JobsNameController;
use \App\Http\Controllers\admin\SpecialistController;
use \App\Http\Controllers\admin\JobCategoryController;
use \App\Http\Controllers\admin\SpecialCategoryController;
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
        Route::controller(PlanController::class)->group(function () {
            Route::get('plans', 'index');
            Route::match(['post', 'get'], 'plan/store', 'store');
            Route::match(['post', 'get'], 'plan/update/{id}', 'update');
            Route::post('plan/delete/{id}', 'delete');
        });
        ///////////////////////////////// start companies ///////////
        ///
        Route::controller(CompanyController::class)->group(function () {
            Route::get('companies', 'index');
            Route::match(['post', 'get'], 'company/store', 'store');
            Route::match(['post', 'get'], 'company/update/{id}', 'update');
            Route::post('company/delete/{id}', 'delete');
        });
        //////////////////////////////// Start Advertesment //////////
        ///
        Route::controller(AdvertesmentController::class)->group(function () {
            Route::get('advertisements', 'index');
            Route::match(['post', 'get'], 'advertisement/store', 'store');
            Route::match(['post', 'get'], 'advertisement/update/{id}', 'update');
            Route::post('advertisement/delete/{id}', 'delete');
            Route::get('send_notification_new_job/{id}','send_notification_new_job');
        });
        /////////////////////////////// Start Users ////////////////
        ///
        Route::controller(UserController::class)->group(function () {
            Route::get('users', 'index');
            Route::match(['post', 'get'], 'user/store', 'store');
            Route::match(['post', 'get'], 'user/details/{id}', 'details');
            Route::post('user/delete/{id}', 'delete');
        });
        //////////////////////////// Start Faqs /////////////////
        ///
        Route::controller(FaqController::class)->group(function () {
            Route::get('faqs', 'index');
            Route::match(['post', 'get'], 'faq/store', 'store');
            Route::match(['post', 'get'], 'faq/update/{id}', 'update');
            Route::post('faq/delete/{id}', 'delete');
        });
        ///////////////////////// Start Terms //////////
        ///
        Route::controller(TermsController::class)->group(function () {
            Route::match(['post', 'get'], 'terms', 'update')->name('terms');
        });
        ///////////////////// Start Other Settings
        ///
        /// /// Category Names
        Route::controller(JobCategoryController::class)->group(function () {
            Route::get('JobCategories', 'index');
            Route::match(['post', 'get'], 'jobcategory/add', 'add');
            Route::match(['post', 'get'], 'jobcategory/update/{id}', 'update');
            Route::post('jobcategory/delete/{id}', 'delete');
        });
        /// /// Job Names
        Route::controller(JobsNameController::class)->group(function () {
            Route::get('jobs_name', 'index');
            Route::match(['post', 'get'], 'job/add', 'add');
            Route::match(['post', 'get'], 'job/update/{id}', 'update');
            Route::post('job/delete/{id}', 'delete');
        });
        ///////////////////// Start Other Settings

        /// /// Speicalist  Names
        Route::controller(SpecialCategoryController::class)->group(function () {
            Route::get('SpecialCategories', 'index');
            Route::match(['post', 'get'], 'specialcategory/add', 'add');
            Route::match(['post', 'get'], 'specialcategory/update/{id}', 'update');
            Route::post('specialcategory/delete/{id}', 'delete');
        });

        /// ///// Specialist
        Route::controller(SpecialistController::class)->group(function () {
            Route::get('specialists', 'index');
            Route::match(['post', 'get'], 'special/add', 'add');
            Route::match(['post', 'get'], 'special/update/{id}', 'update');
            Route::post('special/delete/{id}', 'delete');
        });

        /////////////////////   Startt Blog Controller
        Route::controller(BlogController::class)->group(function () {
            Route::get('blog', 'index');
            Route::match(['post', 'get'], 'blog/add', 'store');
            Route::match(['post', 'get'], 'blog/update/{id}', 'update');
            Route::post('blog/delete/{id}', 'delete');
        });
    });
});
