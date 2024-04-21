<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth APIs

Route::group(['middleware' => ['api'],'namespace' => 'App\Http\Controllers\Api','prefix' => 'auth'], function ($router) {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
});

Route::namespace('App\Http\Controllers\Api')->prefix('auth')->middleware(['jwt.verify','jwt.auth'])->group(function(){
    Route::post('/logout', 'AuthController@logout');
    Route::post('/verify-otp', 'AuthController@verifyOtp');
    Route::post('/resend-otp', 'AuthController@resendOtp');
    Route::post('/refresh-token', 'AuthController@refresh');
    Route::post('/user-profile-update','AuthController@userProfile');
    Route::post('/change_password', 'AuthController@change_password');
    Route::post('/user-device-token', 'AuthController@device_token');
    Route::get('/get-industries', 'AuthController@get_industries');
});


