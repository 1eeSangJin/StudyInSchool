<?php
    /*****************************************************************
     * 작성자 : 1501204 이상진
     * 기능 : 회원가입
     * 설명 : regist_form.php에서 받은 userId, userPw, userNick을
     *       각각 $user_id, $user_pwd, $user_nick에 저장한다.
     *       만약 빈 칸이 있을 시 모든 칸을 다 채워달라는 경고창을 띄운다
     *       모든 칸을 채웠으면 if문을 실행한다. memberDao에 있는
     *       getUser에 입력받은 $user_id값을 넘겨 db에 같은 아이디를
     *       쓰고있는 유저가 있는지 없는지 체크 후 있을 시 에러메시지 출력
     *       없을 시 memberDao에 있는 insertUser에 받아온 값들인
     *       $user_id, $user_pwd, $user_nick를 넣고 회원가입을 완료한 후
     *       메인페이지인 board.php로 돌아간다.
     ****************************************************************/
    require('memberDao.php');
    require('tools.php');

    $user_id = requestValue("userId");
    $user_pwd = requestValue("userPw");
    $user_nick = requestValue("userNick");

    if($user_id && $user_pwd && $user_nick) {
        $mdao = new memberDao();
        if($mdao->getUser($user_id)) {
            errorBack("이미 사용중인 아이디입니다.");
        }else{
            $mdao->insertUser($user_id, $user_pwd, $user_nick);
            okGo("가입이 완료되었습니다.", MAIN_PAGE);
        }
    }else{
        errorBack("모든 칸을 다 채워 주십시오.");
    }


?>