<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function showLoginForm(){
        return view('user.loginForm');
    }

    public function login(){
        require('tools.php');
        require('memberDao.php');
    
        $user_id = requestValue('userId');
        $user_pw = requestValue('userPw');
        $check = false;
    
        $mdao = new memberDao();
        
        $member = $mdao->getUser($user_id);
        $aff = $mdao->getAff($user_id);
    
        if($mdao->getUser($user_id)) {
            if($member['userPw'] == $user_pw) {
                session_start();
                $_SESSION['userId'] = $user_id;
                $_SESSION['userNick'] = $member['userNick'];
                foreach($aff as $row){
                    $_SESSION['affName'] = $row['affName'];
                }
                $check = true;
                return redirect('../main');
            }else{
                errorBack("비밀번호가 틀렸습니다.");
            }
        }else{
            errorBack("그런 회원은 없습니다.");
        }
    }

    public function showSignUpForm(){
        return view('user.signupForm');
    }

    public function signup(){
        
    }
}
