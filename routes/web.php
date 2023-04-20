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
    Route::get('/filter-locale-profiles/{user_id}/{locale_id}', 'filterLocaleProfiles')->name('filter_locale_profiles');
    Route::get('/filter-district-profiles/{user_id}/{district_id}', 'filterDistrictProfiles')->name('filter_district_profiles');
    Route::get('/filter-division-profiles/{user_id}/{division_id}', 'filterDivisionProfiles')->name('filter_division_profiles');
    
    // VIEW PROGRESS REPORTS
    Route::get('/view-progress-report/{user_id}/{client_profile_id}', 'viewProgressReport')->name('view_progress_report');
    Route::get('/progress-report-add-report', 'addProgressReport')->name('add_progress_report');

    // INBOX
    Route::get('/inbox/{user_id}', 'inbox')->name('inbox');

    // AUDIT LOGS
    Route::get('/audit-logs/{user_id}', 'auditLogs')->name('audit_logs');

    // ARCHIVE
    Route::get('/archive/{user_id}', 'archive')->name('archive');
});

require __DIR__ . '/client.php';
require __DIR__ . '/user.php';