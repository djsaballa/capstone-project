<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressController;

Route::middleware('auth')->group(function () {
  // VIEW PROGRESS REPORTS
    Route::get('/view-progress-report/{user_id}/{client_profile_id}', [ProgressController::class, 'viewProgressReport'])->name('view_progress_report');
    Route::get('/add-progress-report/{user_id}/{client_profile_id}', [ProgressController::class, 'addProgressReport'])->name('add_progress_report');

  // VIEW ARCHIVE PROGRESS REPORT
    Route::get('/view-archive-report/{user_id}/{client_profile_id}', [ProgressController::class, 'viewArchiveReport'])->name('view_archive_report');
});
