<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function UserRegistration(Request $request)
    {


        //return User::create($request->input());
        try {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);
            return response()->json([
                'status' => 'Success',
                'message' => "User has been registered successfully."
            ], 200);
        } catch (Exception $e) {
            //return 'Data is not valid';

            return response()->json([
                'status' => 'Failed',
                'message' => "User registration failed."
            ], 200);
            //To see error message
            //return  $e ->getMessage(); //OR the following
            // return response()->json([
            //     'status' => 'Failed',
            //     'message' => $e->getMessage()
            // ],200); 
        }
    }
    // UserLogin
    function UserLogin(Request $request)
    {
        User::where('email','=')
        $res = User::where($request->input())->count();
        if ($res === 1) {
            //Token Issue
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json(['msg' => 'Success', 'data' => $token]);
        } else {
            //Not Authorized
            return response()->json(['msg' => 'Failed', 'data' => 'Unauthorized']);
        }
    }

    function sendOTPToEmail()
    {
    }

    function OTPVerify()
    {
    }

    function SetPassword()
    {
    }

    function ProfileUpdate()
    {
    }
    function ProfileDetails()
    {
    }
}
