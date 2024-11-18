<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [App\Http\Controllers\LoginController::class, "index"])->name("login");
Route::post('/signin', [App\Http\Controllers\LoginController::class, "login"])->name("login_process");
Route::post('/logout', [App\Http\Controllers\LoginController::class, "logout"])->name("logout");

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\LoginController::class, "index"]);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, "dashboard"])->name("dashboard");
    Route::get('/order_list', [App\Http\Controllers\OrderListController::class, 'order_list'])->name('order_list');
    Route::get('/get_all_orders', [App\Http\Controllers\OrderListController::class, 'get_all_orders'])->name('get_all_orders');


    //user create
    Route::get('/get_users', [App\Http\Controllers\UserController::class, 'user_list'])->name('user_list');
    Route::get('/load_super_admin_users', [App\Http\Controllers\UserController::class, 'load_super_admin_users'])->name('load_super_admin_users');
    Route::post('/user_create', [App\Http\Controllers\UserController::class, 'user_create'])->name('user_create');
    Route::post('/user_update', [App\Http\Controllers\UserController::class, 'user_update'])->name('user_update');
    Route::post('/user_delete/{ID}', [App\Http\Controllers\UserController::class, "user_delete"]);

    //company
    Route::get('/get_company', [App\Http\Controllers\CompanyController::class, 'company_list'])->name('company_list');
    Route::get('/load_company_for_table', [App\Http\Controllers\CompanyController::class, 'load_company_for_table'])->name('load_company_for_table');

    //Audit Trails
    Route::get('/apis_call', [App\Http\Controllers\AuditTrailsController::class, 'apis_call'])->name('apis_call');
    Route::get('/load_apis_log_for_table', [App\Http\Controllers\AuditTrailsController::class, 'load_apis_log_for_table'])->name('load_apis_log_for_table');



    //drivers
    Route::get('/get_drivers', [App\Http\Controllers\DriverController::class, 'drivers_list'])->name('drivers_list');
    Route::get('/load_dricer_for_table', [App\Http\Controllers\DriverController::class, 'load_dricer_for_table'])->name('load_dricer_for_table');

    //order details view
    Route::get('/order_details_view/{order_id}', [App\Http\Controllers\OrderListController::class, 'order_details_view'])->name('order_details_view');
    Route::get('/search_filter', [App\Http\Controllers\OrderListController::class, 'search_filter'])->name('search_filter');
    Route::get('/company_filter', [App\Http\Controllers\OrderListController::class, 'company_filter'])->name('company_filter');
    Route::get('/driver_filter', [App\Http\Controllers\OrderListController::class, 'driver_filter'])->name('driver_filter');
    Route::get('/type_filter', [App\Http\Controllers\OrderListController::class, 'type_filter'])->name('type_filter');
    Route::get('/date_filter', [App\Http\Controllers\OrderListController::class, 'date_filter'])->name('date_filter');
    Route::get('/readStatus_Filter', [App\Http\Controllers\OrderListController::class, 'readStatus_Filter'])->name('readStatus_Filter');
    Route::get('/status_Filter', [App\Http\Controllers\OrderListController::class, 'status_Filter'])->name('status_Filter');

    //order docs view
    Route::get('/get_order_related_docs/{order_id}', [App\Http\Controllers\OrderDocScan::class, 'get_order_related_docs'])->name('get_order_related_docs');
    Route::get('/scan_doc_download/{order_id}', [App\Http\Controllers\OrderDocScan::class, 'scan_doc_download'])->name('scan_doc_download');



});

Route::get('/user_password_reset', [App\Http\Controllers\PasswordResetController::class, "user_password_reset"]);
Route::post('/pw_reset_email', [App\Http\Controllers\PasswordResetController::class, "pw_reset_email"])->name('pw_reset_email');
Route::get('/verify_email', [App\Http\Controllers\PasswordResetController::class, "verify_email"])->name('verify_email');
Route::post('/resendEmail', [App\Http\Controllers\PasswordResetController::class, "resendEmail"])->name("resendEmail");
Route::post('/checkOTP', [App\Http\Controllers\PasswordResetController::class, "checkOTP"])->name("checkOTP");
Route::get('/new_password', [App\Http\Controllers\PasswordResetController::class, "new_password"])->name("new_password");
Route::post('/reset_password', [App\Http\Controllers\PasswordResetController::class, "reset_password"])->name("reset_password");

