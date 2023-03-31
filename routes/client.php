<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::controller(ClientController::class)->group(function () {
  // LIST OF PROFILES
  Route::get('/list-of-profiles/{user_id}', 'listOfprofiles')->name('list_of_profiles');

  // VIEW PROFILE
  Route::get('/view-profile-1/{user_id}/{client_profile_id}', 'viewProfile1')->name('view_profile_1');
  Route::get('/view-profile-2/{user_id}/{client_profile_id}', 'viewProfile2')->name('view_profile_2');

  // DELETE CLIENT PROFILE
  Route::post('/delete-profile/{user_id}/{client_profile_id}', 'deleteProfile')->name('delete_profile');

  // ADD PROFILE
  Route::get('/add-profile-privacy/{user_id}', 'addProfilePrivacy')->name('add_profile_privacy');
  Route::get('/add-profile-1/{user_id}', 'addProfile1')->name('add_profile_1');
  Route::post('/add-profile-1-next', 'addProfile1Next')->name('add_profile_1_next');
  Route::get('/add-profile-2/{user_id}', 'addProfile2')->name('add_profile_2');
  Route::post('/add-profile-2-next', 'addProfile2Next')->name('add_profile_2_next');
  Route::get('/add-profile-3/{user_id}', 'addProfile3')->name('add_profile_3');
  Route::get('/add-profile-4/{user_id}', 'addProfile4')->name('add_profile_4');
  Route::post('/add-profile-4-next', 'addProfile4Next')->name('add_profile_4_next');
  Route::get('/add-profile-5/{user_id}', 'addProfile5')->name('add_profile_5');
  Route::post('/add-profile-5-next', 'addProfile5Next')->name('add_profile_5_next');

  // EDIT PROFILE
  Route::get('/edit-profile-1/{user_id}/{client_profile_id}', 'editProfile1')->name('edit_profile_1');
  Route::post('/edit-profile-1-next', 'editProfile1Next')->name('edit_profile_1_next');
  Route::get('/edit-profile-2/{user_id}/{client_profile_id}', 'editProfile2')->name('edit_profile_2');
  Route::post('/edit-profile-2-next', 'editProfile2Next')->name('edit_profile_2_next');
  Route::get('/edit-profile-3/{user_id}/{client_profile_id}', 'editProfile3')->name('edit_profile_3');
  Route::post('/edit-profile-3-medcon-next', 'editProfile3MedConNext')->name('edit_profile_3_medcon_next');
  Route::post('/edit-profile-3-operation-next', 'editProfile3OperationNext')->name('edit_profile_3_operation_next');
  Route::post('/edit-profile-3-philhealth-next', 'editProfile3PhilhealthNext')->name('edit_profile_3_philhealth_next');
  Route::get('/edit-profile-4/{user_id}/{client_profile_id}', 'editProfile4')->name('edit_profile_4');
  Route::post('/edit-profile-4-next', 'editProfile4Next')->name('edit_profile_4_next');
  Route::get('/edit-profile-5/{user_id}/{client_profile_id}', 'editProfile5')->name('edit_profile_5');
  Route::post('/edit-profile-5-next', 'editProfile5Next')->name('edit_profile_5_next');

});