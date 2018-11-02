<?php
    session_start();

    require_once('../tools.php');
    require_once('../dao/boardDao.php');
    
    $num = requestValue('num');
    $page = requestValue('page');
    $dao = new boardDao();

    $userNick = $dao->checkSoldierUser($num);

    foreach($userNick as $check){
      if(!isset($_SESSION['userNick'])){
        echo "<script>alert('로그인 하십시오.')</script>";
        echo "<script>location.replace('../user/login_form.php');</script>";
      }else if($_SESSION['userNick'] == $check['userNick'] || $_SESSION['userNick'] == 'Administrator'){
        $dao->deleteSoldier($num);
        $dao->deleteCommentSoldier($num);
        okGo("삭제되었습니다", 'soldierBoard.php?page=' . $page);
      }else{
        errorBack('삭제 권한이 없습니다.');
      }
    }
?>