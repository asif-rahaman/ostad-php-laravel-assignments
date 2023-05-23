<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class UserDataController extends Controller
{
    // Q1: retrieve the 'name' input field value from the request and store it in a variable called $name.

    function UserInfo(Request $request): string
    {
        $name = $request->input('name');
        return $name;
    }


    // Q2: retrieve the value of the 'User-Agent' header

    function UserAgent(Request $request): string
    {
        $userAgent = $request->header('User-Agent');
        return $userAgent;
    }

    
    
    /* Q3: API endpoint in Laravel that accepts a GET request with a 'page' query parameter. 
            Write the code to retrieve the value of the 'page' parameter from the current request and store it in a variable called $page. 
            If the parameter is not present, set $page to null. */
    
    
    function PageApiEndpoint(Request $request)
    {
        $page = $request->query('page', null);
        if ($page !== null) {
            return $page;
        } else {
            return;
        }
    }


    // Q4: Create a JSON response in Laravel
    
    
    function FormJsonResponse(): JsonResponse
    {
        $data = array(
            "message" => "Success",
            "data" => array(
                "name" => "John Doe",
                "age" => 25
            )
        );
        return response()->json($data);
    }


    /* Q5: You are implementing a file upload feature in your Laravel application. 
    Write the code to handle a file upload named 'avatar' in the current request and store the uploaded file in the 'public/uploads' directory. 
    Use the original filename for the uploaded file.
    */



    function FormFileUploads(Request $request): bool
    {
        $file = $request->file('avatar');
        $file->move(public_path('uploads'), $file->getClientOriginalName());
        return true;
    }
    
    
    //Q6: Retrieve the value of the 'remember_token' cookie from the current request in Laravel and store it in a variable called $rememberToken.  
    //If the cookie is not present, set $rememberToken to null.


    function SetCookie(Request $request)
    {
        $rememberToken = $request->cookie('remember_token', null);
        return $rememberToken;
    }
}
