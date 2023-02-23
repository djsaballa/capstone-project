<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
// Temp Routing
Route::controller(PageController::class)->group(function() {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('list-of-profiles-page', 'listOfprofiles')->name('list-of-profiles');
    Route::get('list-of-users-page', 'listOfUsers')->name('list-of-users');
    Route::get('audit-logs-page', 'auditLogs')->name('audit-logs');
    Route::get('inbox-page', 'inbox')->name('inbox');
    Route::get('archive-page', 'archive')->name('archive');
});
