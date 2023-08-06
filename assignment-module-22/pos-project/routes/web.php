<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PromoEmailController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/UserLogin',[UserController::class,'UserLogin']);
Route::post('/UserRegistration',[UserController::class,'UserRegistration']);
Route::post('/sendOTPToEmail',[UserController::class,'sendOTPToEmail']);
Route::post('/sendOTPToMobile',[UserController::class,'sendOTPToMobile']);
Route::post('/sendOTPToMobile2',[UserController::class,'SmsOTPsender']);
Route::post('/OTPVerify',[UserController::class,'VerifyOTP']);
Route::post('/ResetPassword',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/ProfileUpdate',[UserController::class,'ProfileUpdate']);
Route::post('/Profile',[UserController::class,'ProfileDetails']);

Route::post('/send-promo-email',[PromoEmailController::class,'sendPromotionalEmail']);
