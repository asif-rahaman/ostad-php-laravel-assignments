<?php
namespace App\Helper;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken{

    public static function CreateToken($userEmail):string{  //returntype string
        $key = env('JWTKey');
        $payload = [
            'iss' => 'laravel-token-pos',
            'iat' => time(),
            'exp' => time() + 60*60,
            'userEmail' => $userEmail
        ];

        return JWT::encode($payload,$key,'HS256');
    }
    public static function CreateTokenToResetPassword($userEmail):string{  //returntype string
        $key = env('JWTKey');
        $payload = [
            'iss' => 'laravel-token-pos',
            'iat' => time(),
            'exp' => time() + 60*5,
            'userEmail' => $userEmail
        ];

        return JWT::encode($payload,$key,'HS256');
    }

    public static function VerifyToken($token):string{
        try{
            $key = env('JWTKey') ;
            $decoded = JWT::decode($token,new Key($key,'HS256'));
            return $decoded -> userEmail;
    }
        catch(Exception $e){
            return "unauthorized";

    }

    }
}