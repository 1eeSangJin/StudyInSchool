<?php
    require_once('../tools.php');
    require_once('../dao/boardDao.php');

    $page = requestValue('page');    
    $title = requestValue('title');
    $content = requestValue('contents');
    $num = requestValue('num');
        
    $dao = new boardDao();
    $dao->updateNurse($title, $content, $num);
    okGo('수정되었습니다', 'nurseBoard.php?page=' . $page);
?>  