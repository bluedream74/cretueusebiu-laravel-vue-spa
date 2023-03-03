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
  Route::post('get_history_list', 'ConsultantController@getHistoryList');
  Route::post('get_history_detail', 'ConsultantController@getHistoryDetail');
  Route::post('check_consultant_answer', 'ConsultantController@checkConsultantAnswer');
  Route::post('update_password', 'ProfileController@updatePassword');
  Route::post('get_matching_list', 'ProfileController@getMatchingList');
  Route::post('agree_kakin', 'ProfileController@agreeKakin');
  Route::post('get_all_invoices', 'ProfileController@getAllInvoices');
});

Route::group(['middleware' => 'guest:api'], function() {
  Route::post('login', 'Auth\LoginController@login');
  Route::post('register_proc', 'ProfileController@registerProc');
  Route::post('activate_email', 'ProfileController@activateEmail');
  Route::post('update_introduction', 'ProfileController@updateIntroduction');
  Route::post('/admin_login', 'Admin\Auth\LoginController@login');
  Route::post('send_password_reset_email', 'ProfileController@sendPasswordResetEmail');
  Route::post('reset_password', 'ProfileController@updatePassword');
});

Route::post('regsiter_avatar', 'ProfileController@registerAvatar');
Route::post('contact_proc', 'CommonController@contactProc');
Route::post('send_consultant_content', 'ConsultantController@sendConsultantContent');
Route::post('get_home_data', 'ConsultantController@getHomeData');
Route::post('get_consultant_list', 'ConsultantController@getConsultantList');
Route::post('get_consultant_detail', 'ConsultantController@getConsultantDetail');
Route::post('send_consultant_answer', 'ConsultantController@sendConsultantAnswer');
Route::post('get_all_news', 'ConsultantController@getAllnews');
Route::post('get_news_detail', 'ConsultantController@getNewsDetail');
Route::post('send_contact', 'ConsultantController@sendContact');
Route::post('accept_consultant', 'ConsultantController@acceptConsultant');