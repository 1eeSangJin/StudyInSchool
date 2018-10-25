<?php
    require_once('../tools.php');
    require_once('../dao/boardDao.php');
    
    $userNick = requestValue('userNick');
    $title = requestValue('title');
    $content = requestValue('contents');
    $affName = requestValue('affName');
    
    $dao = new boardDao();
    $dao->insertCommachine($userNick, $title, $content, $affName);
    okGo('등록이 완료되었습니다', 'commachineBoard.php');
?>