<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        /*
            1. request 정보에서 id와 pw parameter를 읽는다.
            2. id와 pw 값이 있다면 
              2.1 id가 본인의 initial이고 (scpark, shchoi)
                  pw가 본인의 학번이면(ex: 9701234)
                  2.1.1
                    scpark님으로 로그인 했습니다.
                    로그아웃 링크 생성
            3. id 또는 pw 값이 없거나 그 값이 일치하지 않으면 
              3.1 
                 아이디 :
                 암호 :
                 로그인 생성.
        */

        $user_id = isset($_REQUEST['user_id'])?$_REQUEST['user_id'] : "";
        $user_pw = isset($_REQUEST['user_pw'])?$_REQUEST['user_pw'] : "";
        $flag = true;
        if(!($user_id && $user_pw)) {
            $user_id = isset($_COOKIE['user_id'])?$_COOKIE['user_id'] : "";
            $user_pw = isset($_COOKIE['user_pw'])?$_COOKIE['user_pw'] : "";
        }       
        if($user_id && $user_pw) {
            if($user_id == "gunhee" && $user_pw == "1501187"){
                $flag = false;
        ?>
        <?=$user_id?>님으로 로그인하셨습니다.<br>
        <a href="logout.php">로그아웃</a>
        <?php  
            setcookie("user_id", $user_id, time()+60*60*24);
            setcookie("user_pw", $user_pw, time()+60*60*24);
            }
        }
        if($flag){
        ?>
            <form method="POST">
                <label>아이디 : </label>
                <input type="text" name="user_id"><br>
                <label>비밀번호 : </label>
                <input type="password" name="user_pw"><br>
                <input type="submit" value="로그인">
            </form>
        <?php
        }   
    ?>
</body>
</html>