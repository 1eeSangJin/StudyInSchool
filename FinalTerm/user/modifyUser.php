<?php
    require_once("../tools.php");
    require_once("../dao/memberDao.php");

    session_start();

    $user_id = requestValue("userId");
    $user_pwd = requestValue("userPw");
    $user_nick = requestValue("userNick");
    $user_phone = requestValue("userPhone");
    $user_aff = requestValue("affNum");

    $dao = new memberDao();
    
    if($user_pwd && $user_pwd && $user_nick && $user_phone && $user_aff){
        $dao->updateUser($user_pwd, $user_nick, $user_phone, $user_aff, $user_id);
        $_SESSION['userNick'] = $user_nick;
        $aff = $dao->getAff($user_id);
        foreach($aff as $row){
            $_SESSION['affName'] = $row['affName'];
        }
        okGo('수정되었습니다.', MAIN_PAGE);
        
    }else {
        errorBack('모든 칸을 채워주십시오.');
    }
?>
