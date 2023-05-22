<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //controller functiuon
    function greet(){
        return 'Hello from Controller';
    }

    function greetAPI(){
        return 'Hello from API specific function';
    }
}
