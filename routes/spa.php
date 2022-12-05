<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SPA Routes
|--------------------------------------------------------------------------
|
| Here is where you can register SPA routes for your frontend. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "spa" middleware group.
|
*/
Route::group(['middleware' => 'basicauth'], function() {
  // ここに対象のページを記述
  // 例）
  Route::get('{path}', 'SpaController')->where('path', '(.*)');
});