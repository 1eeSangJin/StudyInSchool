<?php
 
    require_once("tools.php");
    require_once("BoardDao.php");

    /*
        writer, title, content 값을 request에 추출
        그 값이 모두 존재하면
            DB에 삽입
                $dao = new BoardDao();
                $dao->insertMsg(값...);
            글 목록 페이지로 이동
        값이 하나라도 없으면
            errorBack("모은 항목이 빈칸 없이 입력되야 합니다");
    */

    $writer = requestValue("writer");
    $title = requestValue("title");
    $content = requestValue("content");

    if($writer && $title && $content){
        $dao = new BoardDao();
        $dao->insertMsg($writer, $title, $content);
        okGo("게시글이 등록되었습니다", MAIN_PAGE);
    }else{
        errorBack("모든 항목이 빈칸 없이 입력되야 합니다");
    }

?>