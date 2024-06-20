<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
 function login()
 {
     return view('website.login');
 }
    function register()
    {
        return view('website.register');
    }
    function forget_password()
    {
        return view('website.forget-password');
    }
    function logout()
    {

    }
}
