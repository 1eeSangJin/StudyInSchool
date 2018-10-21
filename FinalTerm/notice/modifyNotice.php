<?php
    require_once('../tools.php');
    require_once('../dao/boardDao.php');

    $page = requestValue('page');    
    $title = requestValue('title');
    $content = requestValue('contents');
    $num = requestValue('num');
        
    $dao = new boardDao();
    $dao->updateNotices($title, $content, $num);
    okGo('수정되었습니다', 'noticeBoard.php?page=' . $page);
?>  