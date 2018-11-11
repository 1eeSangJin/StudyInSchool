<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    //
    public function showLoginForm(){
        return view('user.loginForm');
    }

    public function login(Request $request){
        $userId = $request->input('userId');
        $userPw = $request->input('userPw');

        $data = DB::select('select * from users where userId = ?', [$userId]);
        // if($data){
        //     if($data['userPw'])
        // }else{
        //     return redirect('/user/loginForm')->withErrors('incorrect info');
        // }
        print_r($data['userPw']);

    }

    public function showSignUpForm(){
        return view('user.signupForm');
    }

    public function signup(Request $request){
        // print_r($request->input());
        $userId = $request->input('userId');
        $userPw = $request->input('userPw');
        $email = $request->input('email');
        $userNick = $request->input('userNick');
        $userName = $request->input('userName');
        $sex = $request->input('sex');
        $userPhone = $request->input('userPhone');
        $affNum = $request->input('affNum');

        DB::insert('insert into users(userId, userPw, email, userNick, userName, sex, userPhone, affNum) values(?, ?, ?, ?, ?, ?, ?, ?)', [$userId, $userPw, $email, $userNick, $userName, $sex, $userPhone, $affNum]);
    }

}
