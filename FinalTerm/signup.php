<?php
    require('memberDao.php');
    require('tools.php');
    
    $user_id = requestValue("userId");
    $user_pwd = requestValue("userPw");
    $user_nick = requestValue("userNick");
    $user_name = requestValue("userName");
    $user_sex = requestValue("sex");
    $user_phone = requestValue("userPhone");
    $user_aff = requestValue("affNum");
    
    $mdao = new memberDao();
    if($mdao->getUser($user_id)) {
        errorBack("이미 사용중인 아이디입니다.");
    }else if($mdao->getNick($user_nick)){
        errorBack("이미 사용중인 닉네임입니다.");
    }else{
        $mdao->insertUser($user_id, $user_pwd, $user_nick, $user_name, $user_sex, $user_phone, $user_aff);
        okGo("가입이 완료되었습니다.", MAIN_PAGE);
    }
?>