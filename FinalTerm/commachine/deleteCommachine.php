<?php
    session_start();

    require_once('../tools.php');
    require_once('../dao/boardDao.php');
    
    $num = requestValue('num');
    echo "1";
    $page = requestValue('page');
    echo "1";
    $dao = new boardDao();
    echo "1";

    $userNick = $dao->checkComMachineUser($num);
    echo "1";

    foreach($userNick as $check){
      if(!isset($_SESSION['userNick'])){
        echo "<script>alert('로그인 하십시오.')</script>";
        echo "<script>location.replace('../user/login_form.php');</script>";
      }else if($_SESSION['userNick'] == $check['userNick'] || $_SESSION['userNick'] == 'Administrator'){
        $dao->deleteCommachine($num);
        $dao->deleteCommentComMachine($num);
        okGo("삭제되었습니다", 'commachineBoard.php?page=' . $page);
      }else{
        errorBack('삭제 권한이 없습니다.');
      }
    }
?>