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
  Route::post('get_home_data', 'CommonController@getHomeData');
  Route::post('save_search_condition', 'CommonController@saveSearchCondition');
  Route::post('search_matching_users', 'CommonController@searchMatchingUsers');
  Route::post('get_condition', 'CommonController@getCondition');
  Route::post('get_user_detail', 'CommonController@getUserDetail');
  Route::post('block_user', 'CommonController@blockUser');
  Route::post('get_chatroom_list', 'CommonController@getChatroomList');
  Route::post('check_and_create_chatroom', 'CommonController@checkAndCreateChatroom');
  Route::post('get_message_list', 'CommonController@getMessageList');
  Route::post('send_message', 'CommonController@sendMessage');
  Route::post('favorite_proc', 'CommonController@favoriteProc');
  Route::post('profile_edit_proc', 'CommonController@profileEditProc');
  Route::post('get_news_list', 'CommonController@getNewsList');
  Route::post('taikai1', 'CommonController@taikai1');
  Route::post('taikai2', 'CommonController@taikai2');
  Route::post('get_plan_info', 'CommonController@getPlanInfo');
  Route::post('save_payment_method', 'CommonController@savePaymentMethod');
  Route::post('get_news_detail', 'CommonController@getNewsDetail');
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