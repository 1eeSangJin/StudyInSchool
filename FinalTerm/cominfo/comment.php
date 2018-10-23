<?php
    session_start();

    require_once('../tools.php');
    require_once('../dao/boardDao.php');

    $board_num = requestValue('num');
    $userNick = $_SESSION['userNick'];
    $comment = requestValue('comment');
    $page = requestValue('page');

    if($comment){
        $dao = new boardDao();
        $dao->InputCommentComInfo($board_num, $userNick, $comment);
        echo "<script>location.replace('viewCominfo_form.php?num=$board_num&page=$page');</script>";
    }
?>