<?php
    require_once("tools.php");
    require_once("BoardDao.php");


    $num = requestValue("num");
    $page = requestValue('page');
    $content = requestValue("content");
    $writer = requestValue("writer");
    $title = requestValue("title");

    if($num && $title && $writer && $content){
        $bdao = new BoardDao();
        $bdao->updateMsg($writer, $title, $content,$num);
        echo "<script>alert('수정되었습니다');</script>";
        echo "<script>location.replace('board.php?page=$page');</script>";
    }else{
        errorBack("빈 칸 없이 수정하시오");
    }

?>
