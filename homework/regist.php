<?php
    require('memberDao.php');
    require('tools.php');

    $user_id = requestValue("userId");
    $user_pwd = requestValue("userPw");
    $user_nick = requestValue("userNick");

    if($user_id && $user_pwd && $user_nick) {
        $mdao = new MemberDao();
        if($mdao->getUser($user_id)) {
            // 에러 메시지 출력하고 폼 페이지로 이동
            errorBack("이미 사용중인 아이디입니다.");
        }else{
            $mdao->insertUser($user_id, $user_pwd, $user_nick);
            okGo("가입이 완료되었습니다.", MAIN_PAGE);
        }
    }else{
        // 입력폼이 다 채워져 있지 않은 경우
    }


?>