<?php
    require_once('tools.php');
    require_once('boardDao.php');

    $userNick = requestValue('userNick');
    $title = requestValue('title');
    $content = requestValue('content');

    if($userNick && $title && $content){
        $dao = new boardDao();
        $dao->insertBoard($userNick, $title, $content);
        okGo("등록이 완료되었습니다", MAIN_PAGE);
    }else{
        errorBack("모든 항목을 채워 주세요");
    }
?>