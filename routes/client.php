<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::controller(ClientController::class)->group(function () {
  // LIST OF PROFILES
  Route::get('/list-of-profiles/{employee_id}', 'listOfprofiles')->name('list_of_profiles');

  // VIEW PROFILE
  Route::get('/view-profile-1/{employee_id}/{client_profile_id}', 'viewProfile1')->name('view_profile_1');
  Route::get('/view-profile-2/{employee_id}/{client_profile_id}', 'viewProfile2')->name('view_profile_2');

  // DELETE CLIENT PROFILE
  Route::post('/delete-profile/{employee_id}/{client_profile_id}', 'deleteProfile')->name('delete_profile');

  // ADD PROFILE
  Route::get('/add-profile-privacy/{employee_id}', 'addProfilePrivacy')->name('add_profile_privacy');
  Route::get('/add-profile-1/{employee_id}', 'addProfile1')->name('add_profile_1');
  Route::get('/add-profile-2/{employee_id}', 'addProfile2')->name('add_profile_2');
  Route::get('/add-profile-3/{employee_id}', 'addProfile3')->name('add_profile_3');
  Route::get('/add-profile-4/{employee_id}', 'addProfile4')->name('add_profile_4');
  Route::get('/add-profile-5/{employee_id}', 'addProfile5')->name('add_profile_5');

  // EDIT PROFILE
  Route::get('/edit-profile-1/{employee_id}/{client_profile_id}', 'editProfile1')->name('edit_profile_1');
  Route::post('/edit-profile-1-next', 'editProfile1Next')->name('edit_profile_1_next');
  Route::get('/edit-profile-2/{employee_id}/{client_profile_id}', 'editProfile2')->name('edit_profile_2');
  Route::get('/edit-profile-3/{employee_id}/{client_profile_id}', 'editProfile3')->name('edit_profile_3');
  Route::get('/edit-profile-4/{employee_id}/{client_profile_id}', 'editProfile4')->name('edit_profile_4');
  Route::get('/edit-profile-5/{employee_id}/{client_profile_id}', 'editProfile5')->name('edit_profile_5');

});