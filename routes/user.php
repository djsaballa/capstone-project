<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function () {
  // LIST OF USERS
  Route::get('/list-of-users/{user_id}', 'listOfUsers')->name('list_of_users');

  // VIEW USER
  Route::get('/view-user/{user_id}/{employee_id}', 'viewUser')->name('view_user');

  // ADD USER
  Route::get('/add-user/{user_id}', 'addUser')->name('add_user');
  Route::post('/add-user-save', 'addUserSave')->name('add_user_save');

  // EDIT USER
  Route::get('/edit-user/{user_id}/{employee_id}', 'editUser')->name('edit_user');
  Route::post('/edit-user-save', 'editUserSave')->name('edit_user_save');

  // LIST OF ARCHIVE USER
  Route::get('/list-of-archive-users/{user_id}', 'listOfArchiveUsers')->name('list_of_archive_users');

  // ARCHIVE ADN RESTORE USER
  Route::get('/archive-user/{user_id}/{employee_id}', 'archiveUser')->name('archive_user');
  Route::get('/restore-user/{user_id}/{employee_id}', 'restoreUser')->name('restore_user');
});