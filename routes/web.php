<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
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

// LOGIN
Route::get('/', [UserController::class, 'login'])->name('login');
// LOGIN AUTH
Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login_auth');

Route::middleware('auth')->group(function () {
    // LOGOUT
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // DASHBOARD
    Route::get('/dashboard/{user_id}', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/generate-pdf}', [ReportController::class, 'generatePDF'])->name('generate_pdf');

    // INBOX
    Route::get('/inbox/{user_id}', [UserController::class, 'inbox'])->name('inbox');
    Route::get('/view-inbox/{user_id}/{inbox_id}', [UserController::class, 'viewInbox'])->name('view_inbox');
    Route::post('/send-message', [UserController::class, 'sendMessage'])->name('send_message');

    // AUDIT LOGS
    Route::get('/audit-logs/{user_id}', [UserController::class, 'auditLogs'])->name('audit_logs');

    // SMS
    Route::post('/send-sms', 'SemaphoreController@sendSms');
});

require __DIR__ . '/user.php';
require __DIR__ . '/client.php';
require __DIR__ . '/progress.php';