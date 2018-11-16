<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function showLoginForm(){
        return view('user.loginForm');
    }

    public function showRegisterForm(){
        return view('user.userRegister');
    }


}
