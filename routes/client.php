<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReportController;

Route::middleware('auth')->group(function () {
  // LIST OF PROFILES
  Route::get('/list-of-profiles/{user_id}', [ClientController::class, 'listOfProfiles'])->name('list_of_client_profiles');

  // VIEW PROFILE
  Route::get('/view-profile-1/{user_id}/{client_profile_id}', [ClientController::class, 'viewProfile1'])->name('view_client_profile_1');
  Route::get('/view-profile-2/{user_id}/{client_profile_id}', [ClientController::class, 'viewProfile2'])->name('view_client_profile_2');

  // VEIW PDF
  Route::post('/view-pdf/{user_id}/{client_profile_id}', [ReportController::class, 'viewPDF'])->name('view_pdf');

  // FILTER PROFILES
  Route::get('/filter-locale-profiles/{user_id}/{locale_id}', [ClientController::class, 'filterLocaleProfiles'])->name('filter_locale_profiles');
  Route::get('/filter-district-profiles/{user_id}/{district_id}', [ClientController::class, 'filterDistrictProfiles'])->name('filter_district_profiles');
  Route::get('/filter-division-profiles/{user_id}/{division_id}', [ClientController::class, 'filterDivisionProfiles'])->name('filter_division_profiles');
  
  // ADD PROFILE
  Route::get('/add-profile-privacy/{user_id}', [ClientController::class, 'addProfilePrivacy'])->name('add_client_profile_privacy');
  Route::get('/add-profile-1/{user_id}', [ClientController::class, 'addProfile1'])->name('add_client_profile_1');
  Route::post('/add-profile-1-next', [ClientController::class, 'addProfile1Next'])->name('add_client_profile_1_next');
  Route::get('/add-profile-2/{user_id}', [ClientController::class, 'addProfile2'])->name('add_client_profile_2');
  Route::post('/add-profile-2-next', [ClientController::class, 'addProfile2Next'])->name('add_client_profile_2_next');
  Route::get('/add-profile-3/{user_id}', [ClientController::class, 'addProfile3'])->name('add_client_profile_3');
  Route::post('/add-profile-3-next', [ClientController::class, 'addProfile3Next'])->name('add_client_profile_3_next');
  Route::get('/add-profile-4/{user_id}', [ClientController::class, 'addProfile4'])->name('add_client_profile_4');
  Route::post('/add-profile-4-next', [ClientController::class, 'addProfile4Next'])->name('add_client_profile_4_next');
  Route::get('/add-profile-5/{user_id}', [ClientController::class, 'addProfile5'])->name('add_client_profile_5');
  Route::post('/add-profile-5-next', [ClientController::class, 'addProfile5Next'])->name('add_client_profile_5_next');
  Route::get('/add-profile-6/{user_id}', [ClientController::class, 'addProfile6'])->name('add_client_profile_6');
  
  // EDIT PROFILE
  Route::get('/edit-profile-1/{user_id}/{client_profile_id}', [ClientController::class, 'editProfile1'])->name('edit_client_profile_1');
  Route::post('/edit-profile-1-next', [ClientController::class, 'editProfile1Next'])->name('edit_client_profile_1_next');
  Route::get('/edit-profile-2/{user_id}/{client_profile_id}', [ClientController::class, 'editProfile2'])->name('edit_client_profile_2');
  Route::post('/edit-profile-2-next', [ClientController::class, 'editProfile2Next'])->name('edit_client_profile_2_next');
  Route::get('/edit-profile-3/{user_id}/{client_profile_id}', [ClientController::class, 'editProfile3'])->name('edit_client_profile_3');
  Route::post('/edit-profile-3-medcon-next', [ClientController::class, 'editProfile3MedConNext'])->name('edit_client_profile_3_medcon_next');
  Route::post('/edit-profile-3-operation-next', [ClientController::class, 'editProfile3OperationNext'])->name('edit_client_profile_3_operation_next');
  Route::post('/edit-profile-3-philhealth-next', [ClientController::class, 'editProfile3PhilhealthNext'])->name('edit_client_profile_3_philhealth_next');
  Route::get('/edit-profile-4/{user_id}/{client_profile_id}', [ClientController::class, 'editProfile4'])->name('edit_client_profile_4');
  Route::post('/edit-profile-4-next', [ClientController::class, 'editProfile4Next'])->name('edit_client_profile_4_next');
  Route::get('/edit-profile-5/{user_id}/{client_profile_id}', [ClientController::class, 'editProfile5'])->name('edit_client_profile_5');
  Route::post('/edit-profile-5-next', [ClientController::class, 'editProfile5Next'])->name('edit_client_profile_5_next');
  
  // LIST OF ARCHIVE PROFILE
  Route::get('/list-of-archive-profiles/{user_id}', [ClientController::class, 'listOfArchiveProfiles'])->name('list_of_archive_profiles');

  // VIEW ARCHIVE PROFILE
  Route::get('/view-archive-profile-1/{user_id}/{client_profile_id}', [ClientController::class, 'viewArchiveProfile1'])->name('view_archive_profile_1');
  Route::get('/view-archive-profile-2/{user_id}/{client_profile_id}', [ClientController::class, 'viewArchiveProfile2'])->name('view_archive_profile_2');

  // ARCHIVE AND RESTORE CLIENT PROFILE
  Route::get('/archive-profile/{user_id}/{client_profile_id}', [ClientController::class, 'archiveProfile'])->name('archive_profile');
  Route::get('/restore-profile/{user_id}/{client_profile_id}', [ClientController::class, 'restoreProfile'])->name('restore_profile');

  // FILTER ARCHIVE PROFILES
  Route::get('/filter-locale-profiles-archive/{user_id}/{locale_id}', [ClientController::class, 'filterLocaleProfilesArchive'])->name('filter_locale_profiles_archive');
  Route::get('/filter-district-profiles-archive/{user_id}/{district_id}', [ClientController::class, 'filterDistrictProfilesArchive'])->name('filter_district_profiles_archive');
  Route::get('/filter-division-profiles-archive/{user_id}/{division_id}', [ClientController::class, 'filterDivisionProfilesArchive'])->name('filter_division_profiles_archive');
});