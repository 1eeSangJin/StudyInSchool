<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>2018-09-12</title>

</head>

<body>

    <?php

        session_start();

        // http://Localhost/subject/11-2.php?action=create

        // 요청 정보에서 action이라는 parameter 값을 읽어온다.

        /*

            if(action parameter 값이 존재한다면) {

                if(그 값이 "create")

                    세션변수 user_id 생성 : user_id, "test"

                else if(그 값이 "delete")

                    user_id 세션변수 삭제

             "클라이언트에게 11-1.php를 다시 요청해라"라는 응답을 준다.

            }

        */

        $action = isset($_REQUEST['action'])?$_REQUEST['action'] : "";

        if($action) {

            if($action == "create"){

                $_SESSION["user_id"] = "test";

            }else if($action == "delete"){

                unset($_SESSION["user_id"]);

            }

        }



        // 세션 값 읽기

        $session = isset($_SESSION['user_id'])?$_SESSION['user_id'] : "";

        ?>

        세션변수 user_id 값: <?= $session ?> <br>

        <!-- 쿠키 생성 링크 -->

        <a href="?action=create">세션변수 생성</a><br>



        <!-- 쿠키 삭제 링크 -->

        <a href="?action=delete">세션변수 삭제</a>

</body>

</html123456>