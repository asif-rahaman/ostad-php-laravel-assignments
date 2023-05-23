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

//

Route::post('/a14/userinfo',[UserDataController::class,'UserInfo']);

// Question 2
Route::post('/a14/useragent',[UserDataController::class,'UserAgent']);

// Question 3
Route::get('/a14/pagequery',[UserDataController::class,'PageApiEndpoint']);

// Question 4
Route::get('/a14/jresponse',[UserDataController::class,'FormJsonResponse']);

// Question 5
Route::post('/a14/fileupload',[UserDataController::class,'FormFileUploads']);

// Question 6
Route::post('/a14/setcookie',[UserDataController::class,'SetCookie']);

// Question 7
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
