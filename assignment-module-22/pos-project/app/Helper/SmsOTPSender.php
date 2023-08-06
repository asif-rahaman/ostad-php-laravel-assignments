<?php

namespace App\Helper;

use Exception;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

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
        $client = new Client([
            'verify' => false, // Disable SSL verification
        ]);
    
        $response = $client->post($url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'accept' => 'application/json'
            ],
            'json' => $params
        ]);
    
        return $response->getBody()->getContents();
    }
}
