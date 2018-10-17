<?php
    require_once('../tools.php');
    require_once('../dao/boardDao.php');
    
    $userNick = requestValue('userNick');
    $title = requestValue('title');
    $content = requestValue('contents');
    
    $dao = new boardDao();
    $dao->insertCominfo($userNick, $title, $content);
    echo "<script>alert('등록이 완료되었습니다')</script>";
    echo "<script>location.replace('cominfoBoard.php')</script>";
?>