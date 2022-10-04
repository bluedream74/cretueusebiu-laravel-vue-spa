<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:api'], function () {
  Route::post('logout', 'Auth\LoginController@logout');

  Route::get('/user', 'Auth\UserController@current');
  Route::post('get_profile_info', 'ProfileController@getProfileInfo');
  Route::post('update_profile_info', 'ProfileController@updateProfileInfo');
});

Route::group(['middleware' => 'guest:api'], function() {
  Route::post('login', 'Auth\LoginController@login');
  Route::post('register_proc', 'ProfileController@registerProc');
  Route::post('activate_email', 'ProfileController@activateEmail');
  Route::post('update_introduction', 'ProfileController@updateIntroduction');
  Route::post('/admin_login', 'Admin\Auth\LoginController@login');
  Route::post('send_password_reset_email', 'ProfileController@sendPasswordResetEmail');
  Route::post('reset_password', 'ProfileController@resetPassword');
});

Route::post('regsiter_avatar', 'ProfileController@registerAvatar');
Route::post('contact_proc', 'CommonController@contactProc');
Route::post('send_consultant_content', 'ConsultantController@sendConsultantContent');