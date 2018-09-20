<!DOCTYPE html>
<html lang="ko" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>2018-09-12 PHP</title>
    </head>
    <body>
        <?php
            //요청 정보에서 action이라는 parameter 값을 읽어온다
            /*
            if (action parameter 값이 존재하면){
                if (그 값이 create) {
                    쿠키 생성 : user_id, test, 하루동안 지속
                }
                elseif (그 값이 delete) {
                    user_id 쿠키 삭제
                }
            }
            */

            //쿠키값 읽기
        $cookie = isset($_COOKIE["user_id"])?$_COOKIE["user_id"] : "";
        //쿠키 값을 읽어 cookie라는 변수에 넣음
        // isset - 매개변수로 들어간 변수가 존재하면 true, 그렇지 않으면 false를 리턴한다
        // 삼항 연산자 - 연산될 식? A : B     연산될 식이 ture면 A를 false면 B를 리턴한다.
        // $_COOKIE[X] - X의 값이 쿠키에 들어있는지를 확인한다, 쿠키에 값을 불러오는 역할

        $action = isset($_REQUEST["action"])?$_REQUEST["action"]:"";
        // action이 있는지 없는지를 isset으로 확인한 후 삼항연산자로 값 대입

        if ($action) {
            //action이 true면[있으면]
            if ($action == "create") {
                // action이 create인지 delete인지 확인한다
                setcookie("user_id", "test", time()+60*60*24);
                // setcookie로 쿠키를 설정해준다
                // 쿠키 이름, 값 , 지속시간
                // 지속시간이 없으면 브라우저가 닫힐 때 까지 유효하다
            }elseif ($action == "delete") {
                // action이 create인지 delete인지 확인한다
                setcookie("user_id");
                // 이름만 전달하면 쿠키를 삭제시킨다 [쿠키에 값이 들어가지 않기 때문]
            }
            header("Location: $_SERVER[SCRIPT_NAME]");
            //action이 있을 때만 헤더 생성
            // 헤더는 서버와 클라이언트간 본격적으로 송수신하기 전에 있어서 필요한 정보를 사전에 나누는 것이다.
            // 헤더를 사용해 헤더 정보를 보낼 수 있으며 페이지 이동을 위한 코드는 Location:주소 이다
            // Location은 : 이후의 주소로 이동하라는 헤더 메세지이다.

            // $_SERVER변수는 현재 주소란에 입력된 도메인을 기준으로 해당 도메인으로 접속했을 때 기본적으로 연결되어 있는 폴더를 뜻한다
            // 쿠키가 저장되는 곳은 웹이 아닌 하드디스크 이기 때문에 SERVER변수가 필요하다
            // [SCRIPT_NAME]은 실행되고 있는 파일의 전체 경로를 뜻한[접속하고 있는 파일 경로]
            exit();
        }




        ?>

        user_id 쿠키의 값 : <?=$cookie; ?> </br>
        <!-- 쿠키 생성 링크 -->
        <a href="?action=create">쿠키 생성</a>
        <!-- action에 create를 대입 -->
        <!-- 쿠키 삭제 링크 -->
        <a href="2018-09-12_php_studyCookie.php?action=delete">쿠키 삭제</a>

    </body>
</html>