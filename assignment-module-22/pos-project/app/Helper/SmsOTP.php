<?php
global $sms_otp_api_token, $sms_otp_sid, $sms_otp_domain;
$sms_otp_api_token = env('SMS_API_TOKEN'); //ssl provided api_token from env file
$sms_otp_sid = env('SMS_SID'); // ssl provided sid  from env file
$sms_otp_domain = env('SMS_DOMAIN'); //api domain  from env file

/**
 * @param $msisdn
 * @param $messageBody
 * @param $csmsId (Unique)
 */
function singleSms($msisdn, $messageBody, $csmsId)
{
    global $sms_otp_api_token, $sms_otp_sid, $sms_otp_domain;
    $params = [
        "api_token" => $sms_otp_api_token,
        "sid" => $sms_otp_sid,
        "msisdn" => $msisdn,
        "sms" => $messageBody,
        "csms_id" => $csmsId
    ];
    $url = trim($sms_otp_domain, '/') . "/api/v3/send-sms";
    $params = json_encode($params);
     return callApi($url, $params);
    //echo callApi($url, $params);
}


function callApi($url, $params)
{
    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($params),
        'accept:application/json'
    ));

    $response = curl_exec($ch);

    curl_close($ch);
    return $response;
}
