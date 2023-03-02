<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::controller(EmployeeController::class)->group(function () {
    // LOGIN
    Route::get('/', 'login')->name('login');
        // LOGIN AUTH
        Route::post('/login-auth', 'loginAuth')->name('login_auth');
    // DASHBOARD
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    // LIST OF PROFILES
    Route::get('/list-of-profiles', 'listOfprofiles')->name('list_of_profiles');
        // ADD PROFILE
        Route::get('/add-profile-1', 'addProfile1')->name('add_profile_1');
        Route::get('/add-profile-2', 'addProfile2')->name('add_profile_2');
        Route::get('/add-profile-3', 'addProfile3')->name('add_profile_3');
        Route::get('/add-profile-4', 'addProfile4')->name('add_profile_4');
        Route::get('/add-profile-5', 'addProfile5')->name('add_profile_5');
        Route::get('/add-profile-privacy', 'addProfilePrivacy')->name('add_profile_privacy');
    // LIST OF USERS
    Route::get('/list-of-users', 'listOfUsers')->name('list_of_users');
        // ADD USER
        Route::get('/add-user', 'addUser')->name('add_user');
        // EDIT USER
        Route::get('/edit-user', 'editUser')->name('edit_user');
    // INBOX
    Route::get('/inbox', 'inbox')->name('inbox');
    // AUDIT LOGS
    Route::get('/audit-logs', 'auditLogs')->name('audit_logs');
    // ARCHIVE
    Route::get('/archive', 'archive')->name('archive');
});

// USER