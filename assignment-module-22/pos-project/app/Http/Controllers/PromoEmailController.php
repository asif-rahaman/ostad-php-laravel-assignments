<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PromotionalEmail;

class PromoEmailController extends Controller
{
    //
    public function sendPromotionalEmail(Request $request)
    {
        $content = 'This is a promotional Email.';
        
        $emailList = [
            'asif.u.rahaman@gmail.com',
            'sparrowtech121@gmail.com',
            // Add more email addresses
        ];

        foreach ($emailList as $email) {
            Mail::to($email)->send(new PromotionalEmail($content));
        }

        return "Promotional emails sent successfully!";
    }
}
