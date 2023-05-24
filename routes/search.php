<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::middleware('auth')->group(function () {
    // SEARCH CLIENT PROFILES
    Route::get('/search-client-profiles', [SearchController::class, 'searchClientProfiles'])->name('search_client_profiles');
    
    // SEARCH ARCHIVE PROFILES
    Route::get('/search-archive-profiles', [SearchController::class, 'searchArchiveProfiles'])->name('search_archive_profiles');
    
    // SEARCH USERS
    Route::get('/search-users', [SearchController::class, 'searchUsers'])->name('search_users');
    
    // SEARCH ARCHIVE USERS
    Route::get('/search-archive-users', [SearchController::class, 'searchArchiveUsers'])->name('search_archive_users');
});
