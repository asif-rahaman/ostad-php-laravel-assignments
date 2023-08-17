<?php

namespace App\Helper;

use Exception;
use Illuminate\Support\Facades\Http;

class SmsOTPSender
{
    private $api_token;
    private $sid;
    private $domain;

    public function __construct()
    {
        $this->api_token = env('SMS_API_TOKEN');
        $this->sid = env('SMS_SID');
        $this->domain = env('SMS_DOMAIN');
    }

    public function sendSingleSms($msisdn, $messageBody, $csmsId)
    {
        $params = [
            "api_token" => $this->api_token,
            "sid" => $this->sid,
            "msisdn" => $msisdn,
            "sms" => $messageBody,
            "csms_id" => $csmsId
        ];
        $url = rtrim($this->domain, '/') . "/api/v3/send-sms";
        $response = $this->callApi($url, $params);
        return $response;
    }

    private function callApi($url, $params)
    {
        // Use Axios to make the API call
        $response = Http::post($url, $params, [
            'headers' => [
                'Content-Type' => 'application/json',
                'accept' => 'application/json'
            ]
        ]);

        return $response->body();
    }
}
