<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'AppmanagerController@register')->name('AppRegister');
Route::get('/register', 'AppmanagerController@register')->name('AppRegister');

Route::get('/login', 'AppmanagerController@login')->name('AppLogin');
Route::post('/login', 'AppmanagerController@login')->name('AppLogin');

Route::post('/register_driver', 'AppmanagerController@register_driver');
Route::get('/register_driver', 'AppmanagerController@register_driver');

Route::get('/login_driver', 'AppmanagerController@login_driver');
Route::post('/login_driver', 'AppmanagerController@login_driver');

Route::get('/findtaxis', 'AppmanagerController@findtaxis')->name('AppFindtaxis');
Route::post('/findtaxis', 'AppmanagerController@findtaxis')->name('AppFindtaxis');

Route::get('/add_order', 'AppmanagerController@add_order')->name('AppAddOrder');
Route::post('/add_order', 'AppmanagerController@add_order')->name('AppAddOrder');

Route::get('/get_order', 'AppmanagerController@get_order')->name('AppGetOrder');
Route::post('/get_order', 'AppmanagerController@get_order')->name('AppGetOrder');

Route::get('/get_orders', 'AppmanagerController@get_orders');
Route::post('/get_orders', 'AppmanagerController@get_orders');

Route::get('/get_order_drivers', 'AppmanagerController@get_order_drivers')->name('AppGetOrders');
Route::post('/get_order_drivers', 'AppmanagerController@get_order_drivers')->name('AppGetOrders');


Route::get('/update_order_driver', 'AppmanagerController@update_order_driver');
Route::post('/update_order_driver', 'AppmanagerController@update_order_driver');

Route::get('/get_order_history_drivers', 'AppmanagerController@get_order_history_drivers');
Route::post('/get_order_history_drivers', 'AppmanagerController@get_order_history_drivers');

Route::get('/delete_order_info', 'AppmanagerController@delete_order_info');
Route::post('/delete_order_info', 'AppmanagerController@delete_order_info');

Route::get('/upload_image', 'AppmanagerController@upload_image');
Route::post('/upload_image', 'AppmanagerController@upload_image');

Route::get('/download_image', 'AppmanagerController@download_image');
Route::post('/download_image', 'AppmanagerController@download_image');

Route::get('/get_profile_info', 'AppmanagerController@get_profile_info');
Route::post('/get_profile_info', 'AppmanagerController@get_profile_info');

Route::get('/update_profile_info', 'AppmanagerController@update_profile_info');
Route::post('/update_profile_info', 'AppmanagerController@update_profile_info');

Route::get('/update_profile_gps', 'AppmanagerController@update_profile_gps');
Route::post('/update_profile_gps', 'AppmanagerController@update_profile_gps');

Route::get('/upload_image_driver', 'AppmanagerController@upload_image_driver');
Route::post('/upload_image_driver', 'AppmanagerController@upload_image_driver');

Route::get('/download_image_driver', 'AppmanagerController@download_image_driver');
Route::post('/download_image_driver', 'AppmanagerController@download_image_driver');

Route::get('/get_profile_driver', 'AppmanagerController@get_profile_driver');
Route::post('/get_profile_driver', 'AppmanagerController@get_profile_driver');

Route::get('/update_profile_driver', 'AppmanagerController@update_profile_driver');
Route::post('/update_profile_driver', 'AppmanagerController@update_profile_driver');

Route::get('/update_orders_accept', 'AppmanagerController@update_orders_accept');
Route::post('/update_orders_accept', 'AppmanagerController@update_orders_accept');

Route::get('/add_order_drivers', 'AppmanagerController@add_order_drivers');
Route::post('/add_order_drivers', 'AppmanagerController@add_order_drivers');
