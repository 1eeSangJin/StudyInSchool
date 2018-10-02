<?php
    /***********************************************************************
     * 작성자 : 1501204 이상진
     * 기능 : 수정 기능
     * 설명 : modify_form.php에서 입력받은 content, title과
     *       modify_form.php에 넘겨진 num값을 받아
     *       각각 $content, $title, $num로 저장한다.
     *       만약 빈 값이 있을 시 빈 칸 없이 수정하라는 에러메세지를 출력한다.
     *       모든 값이 채워져 있을 시 boardDao에 있는 updateBoard 함수에
     *       $content, $title, $num을 넘겨 게시글을 수정한 후 메인페이지로 돌아간다
     ************************************************************************/
    require_once("tools.php");
    require_once("boardDao.php");


    $num = requestValue("num");
    $content = requestValue("content");
    $title = requestValue("title");

    if($num && $title && $content){
        $bdao = new boardDao();
        $bdao->updateBoard($title, $content,$num);
        okGo("게시글이 수정되었습니다", MAIN_PAGE);
    }else{
        errorBack("빈 칸 없이 수정하시오");
    }

?>
