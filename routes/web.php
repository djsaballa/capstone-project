<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// ADMIN
Route::controller(UserController::class)->group(function() {
    // DASHBOARD
    Route::get('/', 'dashboard')->name('admin_dashboard');
    // LIST OF PROFILES
    Route::get('/admin-list-of-profiles', 'listOfprofiles')->name('admin_list_of_profiles');
    // LIST OF USERS
    Route::get('/admin-list-of-users', 'listOfUsers')->name('admin_list_of_users');
    // INBOX
    Route::get('/admin-inbox', 'inbox')->name('admin_inbox');
    // AUDIT LOGS
    Route::get('/admin-audit-logs', 'auditLogs')->name('admin_audit_logs');
    // ARCHIVE
    Route::get('/admin-archive', 'archive')->name('admin_archive');
    // LOGIN
    Route::get('/auth-login', 'login')->name('auth_login');
});

// USER