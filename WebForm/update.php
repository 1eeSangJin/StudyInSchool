<?php
    session_start();
    /*
        아이디, 암호, 이름 값을 request에서 추출
        그 값이 모두 존재하면 DB에서 해당 정보를 수정한다. 
        그 값이 하나라도 없으면 errorBack();
    */

    require_once("MemberDao.php");
    require_once("tools.php");
    
    $sid = isset($_SESSION["id"]) ? $_SESSION["id"] : "" ;
    if (!$sid){ //로그인 하지 않았으면
        errorBack("로그인부터 해라");
    } else{ //로그인 한 경우
        if($sid != $id)
            errorBack("니꺼 아님");
    }

    $id = requestValue("id");
    $pw = requestValue("pw");
    $name = requestValue("name");

    if($id && $pw &&$name){
        $mdao = new MemberDao();
        $mdao->updateMember($id, $pw, $name);
        $_SESSION["name"] = $name;
        okGo("회원정보가 수정되었습니다.", MAIN_PAGE);
    }

    errorBack("왜 안될까요");
?>