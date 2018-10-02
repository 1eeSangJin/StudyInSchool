<?php
    /**********************************************************************************
     * 작성자 : 1501204 이상진
     * 기능 : 이용자가 등록하려는 글을 db에 저장하는 기능
     * 설명 : write_form.php에서 보내진 userNick, title, content를 각각
     *       $userNick, $title, $content로 받아 boardDao에 있는 insertBoard에 보내
     *       게시판에 글 쓰기를 완료하고, 등록이 완료되었다는 알림창과 함께 메인페이지인
     *       board.php로 넘어간다.
     *********************************************************************************/
    require_once('tools.php');
    require_once('boardDao.php');

    $userNick = requestValue('userNick');
    $title = requestValue('title');
    $content = requestValue('content');

    $dao = new boardDao();
    $dao->insertBoard($userNick, $title, $content);
    okGo("등록이 완료되었습니다", MAIN_PAGE);

?>