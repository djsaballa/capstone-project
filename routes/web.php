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
    
    // VIEW PROGRESS REPORTS
    Route::get('/view-progress-report/{user_id}/{client_profile_id}', 'viewProgressReport')->name('view_progress_report');
    Route::get('/progress-report-add-report', 'addProgressReport')->name('add_progress_report');

    // INBOX
    Route::get('/inbox/{user_id}', 'inbox')->name('inbox');

    // AUDIT LOGS
    Route::get('/audit-logs/{user_id}', 'auditLogs')->name('audit_logs');
});

require __DIR__ . '/client.php';
require __DIR__ . '/user.php';