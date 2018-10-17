<?php
    require_once('tools.php');
    require_once('boardDao.php');

    $num = requestValue('num');
    $page = requestValue('page');

    $dao = new boardDao();

    $dao->deleteMsg($num);
    echo "<script>alert('삭제되었습니다');</script>";
    echo "<script>location.replace('board.php?page=$page');</script>";

?>