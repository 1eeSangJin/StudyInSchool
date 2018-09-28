<?php
    require('memberDao.php');
    require('tools.php');

    $user_id = requestValue('userId');
    $user_pw = requestValue('userPw');
    $check = false;

    if($user_id && $user_pw) {
        $mdao = new memberDao();
        $member = $mdao->login($user_id);

        if($mdao->login($user_id)) {
            if($member['userPw'] = $user_pw) {
                session_start();
                $_SESSION['userId'] = $user_id;
                $_SESSION['userNick'] = $member['userNick'];
                $check = true;
                okGo('로그인에 성공하셨습니다.', "board.php?check=$check");
            }else{
                echo "<script>alert('비밀번호가 틀리셨습니다.');</script>";
                echo "<script>location.replace('board.php');</script>";
            }
        }else{
            echo "<script>alert('그런 회원은 없습니다.');</script>";
            echo "<script>location.replace('board.php');</script>";
        }
    }
?>