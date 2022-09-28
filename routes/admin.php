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

Route::group(['middleware' => 'auth.admin:admin'], function () {
    Route::post('user', 'Auth\UserController@current');

    Route::post('logout', 'Auth\LoginController@logout');

    // ユーザー管理
    Route::post('/get_users', 'CommonController@getUsers');
    Route::post('/get_user_detail', 'CommonController@getUserDetail');
    Route::post('/delete_user', 'CommonController@deleteUser');
    Route::post('/warning_proc', 'CommonController@warningProc');
    Route::post('/get_deleted_users', 'CommonController@getDeletedUsers');

    // お問い合わせ管理
    Route::post('/get_contacts', 'CommonController@getContacts');
    Route::post('/send_answer_proc', 'CommonController@sendAnswerProc');

    // メッセージ管理
    Route::post('/get_chatrooms', 'CommonController@getChatrooms');
    Route::post('/get_message_list', 'CommonController@getMessageList');
    Route::post('/block_user', 'CommonController@blockUser');

    // お知らせ管理
    Route::post('/get_news', 'CommonController@getNews');
    Route::post('/create_news', 'CommonController@createNews');
    Route::post('/get_news_edit_init', 'CommonController@getNewsEditInit');
    Route::post('/update_news', 'CommonController@updateNews');
});