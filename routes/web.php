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

    // LOAD OPTIONS
    Route::get('/get-district-options/{division_id}', 'getDistrictOptions')->name('get_district_options');

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

require __DIR__ . '/client.php';