<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserDataController;

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

// Route::get('/hello',[HelloController::class,'greet']);
// Route::get('/hc2',[HelloController::class,'greetAPI']);

//Q1: UserInfo

Route::post('/a14/userinfo',[UserDataController::class,'UserInfo']);

// Q2: UsrAgent
Route::post('/a14/useragent',[UserDataController::class,'UserAgent']);

// Q3: PageApiEndpoint
Route::get('/a14/pagequery',[UserDataController::class,'PageApiEndpoint']);

// Q4: FormJsonResponse
Route::get('/a14/jresponse',[UserDataController::class,'FormJsonResponse']);

// Q5: FormFileUploads
Route::post('/a14/fileupload',[UserDataController::class,'FormFileUploads']);

// Q6: SetCookie
Route::post('/a14/setcookie',[UserDataController::class,'SetCookie']);

// Q7: Submit
Route::post('/a14/submit',function(Request $request){
    $email = $request->input('email');
    if($email){
        return array(
            "success"=> true,
            "message"=> "Form submitted successfully."
        );
    }else{
        return "Email field is required!";
    }
});