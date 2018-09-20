<?php
    /*
        1. 회원가입폼에서 입력된 정보를 추출
        2. 모든 입력 필드의 값이 채워져 있는지 check
            2.1 다 채워져 있지 않으면 "다 채워 주세요"라는 메시지를 띄워주고
                홰원가입폼으로 이동
        3. 아이디가 이미 사용중인지 check
            3.1 이미 사용중이라면 "이미 사용중인 아이디입니다"라는 메시지를 띄워주고 회원가입폼으로 이동
        4. 데이터베이스에 회원정보를 insert
        5. 메인 페이지로 이동
    */
    require('tools.php');
    require('MemberDao.php');

    $id = requestValue("id");
    $pwd = requestValue("pw");
    $name = requestValue("name");

    if($id && $pwd && $name) {
        $mdao = new MemberDao();
        if($mdao->getMember($id)) {
            // 에러 메시지 출력하고 폼 페이지로 이동
            errorBack("이미 사용중인 아이디입니다.");
        }else{
            $mdao->insertMember($id, $pwd, $name);
            okGo("가입이 완료되었습니다.", MAIN_PAGE);
        }
    }else{
        // 입력폼이 다 채워져 있지 않은 경우
        errorBack("모든 입력란을 채워주세요.");
    }


?>