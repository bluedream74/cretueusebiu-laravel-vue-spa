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

    // 支援機関管理
    Route::post('/get_register_list', 'CommonController@getRegisterList');
    Route::post('/get_register_history', 'CommonController@getRegisterHistory');
    Route::post('/change_available', 'CommonController@changeAvailable');
    Route::post('/change_need_pay', 'CommonController@changeNeedPay');
    Route::post('/delete_user', 'CommonController@deleteUser');
    Route::post('/get_register_invoices', 'CommonController@getRegisterInvoices');
    Route::post('/add_koukoku', 'CommonController@addKoukoku');
    Route::post('/get_user_info', 'CommonController@getUserInfo');
    Route::post('/user_info_edit', 'CommonController@userInfoEdit');

    // お知らせ
    Route::post('/get_news_list', 'CommonController@getNewsList');
    Route::post('/delete_news_proc', 'CommonController@deleteNewsProc');
    Route::post('/create_news', 'CommonController@createNews');
    Route::post('/update_news', 'CommonController@updateNews');
    Route::post('/get_news_detail', 'CommonController@getNewsDetail');
    Route::post('/change_news_public', 'CommonController@changeNewsPublic');

    // バーナー
    Route::post('/get_banner_list', 'CommonController@getBannerList');
    Route::post('/delete_banner_proc', 'CommonController@deleteBannerProc');
    Route::post('/create_banner', 'CommonController@createBanner');
    Route::post('/update_banner', 'CommonController@updateBanner');
    Route::post('/get_banner_detail', 'CommonController@getBannerDetail');
    Route::post('/change_banner_public', 'CommonController@changeBannerPublic');

    // 事業者
    Route::post('/get_consultant_list', 'CommonController@getConsultantList');
    Route::post('/change_consultant_available', 'CommonController@changeConsultantAvailable');
    Route::post('/delete_consultant', 'CommonController@deleteConsultant');
    Route::post('/get_consultant_info', 'CommonController@getConsultantInfo');
    Route::post('/save_consultant_content', 'CommonController@saveConsultantContent');

    // 課金額管理
    Route::post('/get_billing_data', 'CommonController@getBillingData');

    Route::post('/save_master', 'CommonController@saveMaster');
});

Route::get('/download_csv', 'CommonController@downloadCSV');
Route::get('/download_consultants_csv', 'CommonController@downloadConsultantsCSV');