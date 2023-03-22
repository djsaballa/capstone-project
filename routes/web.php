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
    Route::get('/dashboard/{employee_id}', 'dashboard')->name('dashboard');

    // LIST OF PROFILES
    Route::get('/list-of-profiles/{employee_id}', 'listOfprofiles')->name('list_of_profiles');

        // VIEW PROFILE
        Route::get('/view-profile-1/{employee_id}/{client_profile_id}', 'viewProfile1')->name('view_profile_1');
        Route::get('/view-profile-2/{employee_id}/{client_profile_id}', 'viewProfile2')->name('view_profile_2');

        // ADD PROFILE
        Route::get('/add-profile-privacy/{employee_id}', 'addProfilePrivacy')->name('add_profile_privacy');
        Route::get('/add-profile-1/{employee_id}', 'addProfile1')->name('add_profile_1');
        Route::get('/add-profile-2/{employee_id}', 'addProfile2')->name('add_profile_2');
        Route::get('/add-profile-3/{employee_id}', 'addProfile3')->name('add_profile_3');
        Route::get('/add-profile-4/{employee_id}', 'addProfile4')->name('add_profile_4');
        Route::get('/add-profile-5/{employee_id}', 'addProfile5')->name('add_profile_5');

        // EDIT PROFILE
        Route::get('/edit-profile-1/{employee_id}/{client_profile_id}', 'editProfile1')->name('edit_profile_1');
        Route::get('/edit-profile-2/{employee_id}/{client_profile_id}', 'editProfile2')->name('edit_profile_2');
        Route::get('/edit-profile-3/{employee_id}/{client_profile_id}', 'editProfile3')->name('edit_profile_3');
        Route::get('/edit-profile-4/{employee_id}/{client_profile_id}', 'editProfile4')->name('edit_profile_4');
        Route::get('/edit-profile-5/{employee_id}/{client_profile_id}', 'editProfile5')->name('edit_profile_5');

        // VIEW PROGRESS REPORTS
        Route::get('/view-progress-report/{employee_id}/{client_profile_id}', 'viewProgressReport')->name('view_progress_report');
        Route::get('/progress-report-add-report', 'addProgressReport')->name('add_progress_report');
       

    // LIST OF USERS
    Route::get('/list-of-users/{employee_id}', 'listOfUsers')->name('list_of_users');

        // ADD USER
        Route::get('/add-user/{employee_id}', 'addUser')->name('add_user');

        // EDIT USER
        Route::get('/edit-user/{employee_id}/{user_id}', 'editUser')->name('edit_user');

    // INBOX
    Route::get('/inbox/{employee_id}', 'inbox')->name('inbox');

    // AUDIT LOGS
    Route::get('/audit-logs/{employee_id}', 'auditLogs')->name('audit_logs');

    // ARCHIVE
    Route::get('/archive/{employee_id}', 'archive')->name('archive');
});