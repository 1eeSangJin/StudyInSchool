<?php
    session_start();
    require_once('../tools.php');
    require_once('../dao/memberDao.php');

    $user_id = requestValue('userId');
    $dao = new memberDao();

    $dao->deleteUser($user_id);
    session_destroy();
    okGo('회원탈퇴가 완료되었습니다', MAIN_PAGE);
?>