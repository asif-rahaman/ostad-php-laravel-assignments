<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserDataController;

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

// Route::get('/hello',function(){ //This is a anonymous function
//     return 'Bismillaah, In the name of Allah the most merciful';
// });

// //Using HelloController

// Route::get('/hc',[HelloController::class,'greet']);

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
