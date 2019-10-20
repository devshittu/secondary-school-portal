<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
//    Route::get('/home', function () {
//         Uses first & second Middleware
//    });
    Route::get('settings',  'SettingsController@index')->name('settings');
    Route::post('settings/update',  'SettingsController@update')->name('settings_update');
    Route::post('settings/exam/update',  'SettingsController@exam_update')->name('settings_exams_update');
    Route::post('user/candidate/score/{user_id}/update',  'UsersController@candidate_score_update')->name('update_candidate_score');
});