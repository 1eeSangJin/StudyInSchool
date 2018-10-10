<?php
    /**********************************************
     * 작성자 : 1501204 이상진
     * 설명 : 로그인을 처리하는 php
     * $user_id와 $user_pw는 login_form에서 로그인하기 위해 입력했던 값들을 받는다
     * $check는 로그인 전의 상태(false)
     * if문안의 내용은$user_id와 $user_pw가 다 채워져 있을 시 돌아간다
     * dao에 있는 getUser에 $user_id를 보내 db에 저장된 유저정보에 입력된 아이디가 있는지 없는지 체크한다.
     * 만약 아이디가 없을 시 회원 정보가 없다는 경고창을 띄우고 로그인창으로 돌아간다.
     * 아이디가 있으며, 비밀번호가 같을 시 세션에 유저의 아이디와 유저의 닉네임을 올린다.
     * 만약 비밀번호가 틀렸을 시 비밀번호가 틀렸다는 경고창이 뜨고 로그인 창으로 돌아간다.
     * 만약 id를 입력하지 않았거나, 비밀번호를 입력하지 않았을 경우 입력하지 않은 곳을 입력하라는 경고창이 뜨게된다.
     *********************************************/

    require('tools.php');
    require('memberDao.php');

    $user_id = requestValue('userId');
    $user_pw = requestValue('userPw');
    $check = false;

    $mdao = new memberDao();
    
    $member = $mdao->getUser($user_id);

    if($mdao->getUser($user_id)) {
        if($member['userPw'] == $user_pw) {
            session_start();
            $_SESSION['userId'] = $user_id;
            $_SESSION['userNick'] = $member['userNick'];
            $check = true;
            okGo('로그인에 성공하셨습니다.', "board.php?check=$check");
        }else{
            errorBack("비밀번호가 틀렸습니다.");
        }
    }else{
        errorBack("그런 회원은 없습니다.");
    }
?>