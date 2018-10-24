<?php
    session_start();

    require_once('../tools.php');
    require_once('../dao/boardDao.php');

    $board_num = requestValue('num');
    $comment = requestValue('comment');
    $page = requestValue('page');

    if(!isset($_SESSION['userNick'])){
        error_reporting(0);
        // errorBack('로그인 하십시오');
    }else if(!$comment){
        // errorBack('내용을 입력하십시오');
    }else{
        $userNick = $_SESSION['userNick'];
        $affName = $_SESSION['affName'];
        $dao = new boardDao();
        $dao->InputCommentNotices($board_num, $userNick, $affName, $comment);
        echo "<script>location.replace('viewNotice_form.php?num=$board_num&page=$page');</script>";
    }
?>