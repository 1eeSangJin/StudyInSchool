<?php
    require_once("tools.php");
    require_once("BoardDao.php");


    $num = requestValue("num");
    $content = requestValue("content");
    $writer = requestValue("writer");
    $title = requestValue("title");

    if($num && $title && $writer && $content){
        $bdao = new BoardDao();
        $bdao->updateMsg($writer, $title, $content,$num);
        okGo("게시글이 수정되었습니다", MAIN_PAGE);
    }else{
        errorBack("빈 칸 없이 수정하시오");
    }

?>
