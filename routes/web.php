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

Route::controller(UserController::class)->group(function () {
    // LOGIN
    Route::get('/', 'login')->name('login');
        // LOGIN AUTH
        Route::post('/login-auth', 'loginAuth')->name('login_auth');

    // DASHBOARD
    Route::get('/dashboard/{user_id}', 'dashboard')->name('dashboard');

    // LOAD OPTIONS
    Route::get('/get-district-options/{division_id}', 'getDistrictOptions')->name('get_district_options');

    // VIEW PROGRESS REPORTS
    Route::get('/view-progress-report/{user_id}/{client_profile_id}', 'viewProgressReport')->name('view_progress_report');
    Route::get('/progress-report-add-report', 'addProgressReport')->name('add_progress_report');

    // LIST OF USERS
    Route::get('/list-of-users/{user_id}', 'listOfUsers')->name('list_of_users');

        // ADD USER
        Route::get('/view-user/{user_id}/{employee_id)', 'viewUser')->name('view_user');
        
        // ADD USER
        Route::get('/add-user/{user_id}', 'addUser')->name('add_user');

        // EDIT USER
        Route::get('/edit-user/{user_id}/{employee_id}', 'editUser')->name('edit_user');

    // INBOX
    Route::get('/inbox/{user_id}', 'inbox')->name('inbox');

    // AUDIT LOGS
    Route::get('/audit-logs/{user_id}', 'auditLogs')->name('audit_logs');

    // ARCHIVE
    Route::get('/archive/{user_id}', 'archive')->name('archive');
});

require __DIR__ . '/client.php';