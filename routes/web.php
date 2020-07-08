<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
Route::post('/admin/verify', 'AdminController@verify')->name('AdminVerify');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/driver', function () {
    return view('driver');
});
Route::get('/taxi', function () {
    return view('taxi');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/single-taxi', function () {
    return view('single-taxi');
});
Route::get('/blog-single', function () {
    return view('blog-single');
});
Route::get('/book-ride', function () {
    return view('book-ride');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blog-details', function () {
    return view('blog-details');
});
Route::get('/contact', function () {
    return view('contact');
});
//manager

Route::get('/manager/dashboard', 'ManagerController@dashboard')->name('ManagerDashboard');
Route::get('/manager/userinfo', 'ManagerController@userinfo')->name('ManagerUserinfo');
Route::get('/manager/orderinfo', 'ManagerController@orderinfo')->name('ManagerOrderinfo');
Route::get('/manager/userprofile', 'ManagerController@userprofile')->name('ManagerUserprofile');

//API
Route::get('/app/register', 'AppmanagerController@register')->name('AppRegister');
Route::post('/app/register', 'AppmanagerController@register')->name('AppRegister');
Route::get('/app/login', 'AppmanagerController@login')->name('AppLogin');
Route::post('/app/login', 'AppmanagerController@login')->name('AppLogin');
// Route::get('/app/getUserinfo', 'AppmanagerController@get_userinfo')->name('AppGetUserInfo');
// Route::get('/app/getMessages', 'AppmanagerController@get_messages')->name('AppGetMessages');
// Route::get('/app/getMessageHistory', 'AppmanagerController@get_message_history')->name('AppGetMessageHistory');
// Route::get('/app/getMessageInfo', 'AppmanagerController@get_message_info')->name('AppGetMessageInfo');
// Route::get('/app/updateMessageInfo', 'AppmanagerController@update_message_info')->name('AppUpdateMessageInfo');
// Route::get('/app/get_hairs', 'AppmanagerController@get_hairs')->name('AppGetHairs');
// Route::get('/app/get_hair', 'AppmanagerController@get_hair')->name('AppGetHair');
// Route::get('/app/request_hair', 'AppmanagerController@requestHair')->name('AppRequestHair');
// Route::get('/app/updateCustomeInfo', 'AppmanagerController@update_custome_info')->name('AppUpdateCustomeInfo');
// Route::get('/app/getOrders', 'AppmanagerController@get_orders')->name('AppGetOrders');
