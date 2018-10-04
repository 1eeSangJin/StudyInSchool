<?php
    /*********************************************************************************
     * 작성자 : 1501204 이상진
     * 기능 : 게시글 삭제 기능
     * 설명 : modify_form.php에서 삭제를 눌러서 확인을 눌렀을 때 작동한다.
     *        넘겨진 num값을 $num에 넣는다.
     *        그 후 boardDao에 있는 checkUser 함수에 num값을 넘겨
     *        게시글을 작성한 유저와 로그인한 유저의 닉네임을 체크한다.
     *        만약 게시글 작성자와 로그인한 유저의 닉네임이 같을 시
     *        만일 삭제을 한다고 했을 시 check는 true가 되어 else로 넘어가 삭제를 수행
     *        그 후 삭제되었나는 알람과 함께 메인창인 board.php로 넘어간다.
     *        삭제를 하지 않는다고 했을 시엔 바로 board.php로 넘어간다.
     *        만약 게시글을 작성한 유저와 로그인 한 유저의 닉네임이 틀릴 경우
     *        본인만 삭제할 수 있다는 경고창을 띄우고 board.php로 넘어간다.
     ********************************************************************************/
    session_start();

    require_once('tools.php');
    require_once('boardDao.php');

    $num = requestValue('num');
    $dao = new boardDao();
    $userNick = $dao->checkUser($num);

    foreach($userNick as $check){
        if($_SESSION['userNick'] == $check['userNick']){
            $dao->deleteBoard($num);
            echo "<script>alert('삭제되었습니다');</script>";
            echo "<script>location.replace('board.php');</script>";
        }else{
            echo "<script>alert('본인만 삭제할 수 있습니다.')</script>";
            echo "<script>location.replace('board.php');</script>";
        }
    }
?>