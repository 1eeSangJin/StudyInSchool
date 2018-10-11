<?php
    require_once("tools.php");
    require_once("memberDao.php");

    session_start();

    $user_id = requestValue("userId");
    $user_pwd = requestValue("userPw");
    $user_nick = requestValue("userNick");
    $user_phone = requestValue("userPhone");
    $user_aff = requestValue("affNum");

    $dao = new memberDao();
    $aff = $dao->getAff($user_id);


    if(($user_nick == $_SESSION['userNick']) or ($user_pwd && $user_pwd && $user_nick && $user_phone && $user_aff)){
        $dao->updateUser($user_pwd, $user_nick, $user_phone, $user_aff, $user_id);
        $_SESSION['userNick'] = $user_nick;
        foreach($aff as $row){
            $_SESSION['affName'] = $row['affName'];
        }
        okGo('수정되었습니다.', MAIN_PAGE);
        
    }else {
        errorBack('로그인이 되어있지 않습니다.');
    }
?>
