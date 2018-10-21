<?php
    session_start();

    require_once('../tools.php');
    require_once('../dao/boardDao.php');
    
    $num = requestValue('num');
    $page = requestValue('page');
    $dao = new boardDao();

    if(!isset($_SESSION['userNick'])){
        echo "<script>alert('부적절한 접근입니다.')</script>";
        echo "<script>location.replace('noticeBoard.php');</script>";
    }else{
        $dao->deleteCominfo($num);
        okGo("삭제되었습니다", 'cominfoBoard.php?page=' . $page);
    }
?>