<?php
    /*
        1. 로그인 입력폼에서 전달된 아이디, 비밀번호 읽기
        2. 로그인 폼에 입력된 아이디의 회원정보를 DB에서 읽기
        3. 그런 아이디를 가진 레코드가 있고, 비밀번호가 맞으면 로그인
            -> 세션에 로그인 정보를 저장...
        4. 레코드가 없거나, 비밀번호가 틀리면 로그인 폼 페이지로 이동(에러 메시지 출력 후)
    */

    require('MemberDao.php');
    require('tools.php');

    $user_id = requestValue('id');
    $user_pw = requestValue('pw');
    $check = false;

    if($user_id && $user_pw) {
        $mdao = new MemberDao();
        $member = $mdao->getMember($user_id);
        if($mdao->getMember($user_id)) {
            if($member['pw'] = $user_pw) {
                session_start();
                $_SESSION['id'] = $user_id;
                $_SESSION['name'] = $member['name'];
                $check = true;
                okGo('로그인에 성공하셨습니다.', "index.php?check=$check");
            }else{
                echo "<script>alert('비밀번호가 틀리셨습니디.');</script>";
                echo "<script>location.replace('index.php');</script>";
            }
        }else{
            echo "<script>alert('그런 회원은 없습니다.');</script>";
            echo "<script>location.replace('index.php');</script>";
        }
    }
?>