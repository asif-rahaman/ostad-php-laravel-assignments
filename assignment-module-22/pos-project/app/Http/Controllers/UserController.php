<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPEmail;
use App\Helper\SmsOTPSender;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

include(app_path() . '\Helper\SmsOTP.php');
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
        $count = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->count();
        //$res = User::where($request->input())->count();
        if ($count === 1) {
            //User Login -> JWT Token Issue
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status' => 'Success',
                'message' => 'User Logged in Successfully',
                'token' => $token
            ]);
        } else {
            //Not Authorized
            return response()->json([
                'status' => 'Failed',
                'message' => 'Unauthorized'
            ]);
        }
    }

    function sendOTPToEmail(Request $request)
    {
        $email = $request->input('email');
        $otp = rand(1000, 9999);
        $count = User::where('email', '=', $email)->count();
        if ($count === 1) {

            //Send OTP to email
            Mail::to($email)->send(new OTPEmail($otp));


            //Update OTP in Database
            User::where('email', '=', $email)->update(['otp' => $otp]);

            return response()->json([
                'status' => 'success',
                'message' => 'A 4 digit OTP code Has been sent to your Email'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized'
            ]);
        }
    }
    function sendOTPToMobile(Request $request)
    {
        //can add email check
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $otp = rand(1000, 9999);
        $count = User::Where('email', '=', $email)
            ->where('mobile', '=', $mobile)->count();
        if ($count === 1) {
            //Send OTP to Mobile SMS
            $msisdn = $mobile;
            $messageBody = "Your MyPOS OTP is " . $otp;
            $csmsId = "2934fe343"; // csms id must be unique
            $sms = singleSms($msisdn, $messageBody, $csmsId);
            $smsData = json_decode($sms, true);
            //print_r($smsData);
            $smsStatus = $smsData['status'];
            $smsStatusCode = $smsData['status_code'];
            // if($sms.'status_code' == 4001){return "Vua";}
            if ($smsStatusCode == 200) {

                //Update OTP in Database
                User::where('email', '=', $email)->update(['otp' => $otp]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'A 4 digit OTP code Has been sent to your Email'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something'
            ]);
        }
    }
    function SmsOTPsender(Request $request)
    {
        //can add email check
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $otp = rand(1000, 9999);
        $count = User::Where('email', '=', $email)
            ->where('mobile', '=', $mobile)->count();
        if ($count === 1) {
            //$api_token, $sid, $domain;
            $smsSender = new SmsOTPSender();
            $msisdn = $mobile;
            $messageBody = "Your MyPOS OTP is " . $otp;
            $csmsId = time(); // csms id must be unique

            //Send OTP to Mobile SMS
            $SmsResponse = $smsSender->sendSingleSms($msisdn, $messageBody, $csmsId);
            $SmsResponseData = json_decode($SmsResponse, true);
            print_r($SmsResponseData);
            $smsStatus = $SmsResponseData['status'];
            $smsStatus_code = $SmsResponseData['status_code'];
            $smsError_message = $SmsResponseData['error_message'];


            if ($smsStatus_code == 200) {

                //Update OTP in Database
                User::where('email', '=', $email)->update(['otp' => $otp]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'A 4 digit OTP code Has been sent to your Email'
                ]);
            }else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Something went wrong with OTP sms'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'You are notAuthorized'
            ]);
        }
    }

    function VerifyOTP(Request $request)
    {
        $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email', '=', $email)
            ->where('otp', '=', $otp)->count();
        if ($count === 1) {
            //database OTP update
            User::where('email', '=', $email)->update(['otp' => '0']);


            //issue a token to reset Password
            $token = JWTToken::CreateTokenToResetPassword($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'The OTP Verification was successful',
                'token' => $token
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'OTP Unauthorized'
            ]);
        }
    }

    function ResetPassword(Request $request)
    {
        try {
            $email = $request->header('email');
            $password = $request->input('password');
            User::where('email', '=', $email)->update(['password' => $password]);
            return response()->json([
                'status' => 'success',
                'message' => 'Password update request was successful'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'
            ]);
        }
    }

    function ProfileUpdate()
    {
    }
    function ProfileDetails()
    {
    }
}
