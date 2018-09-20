<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    
    <?php session_start() ?>

    <div class=="container">
        <div class="jumbptron">
            <h1>회원가입과 로그인 튜토리얼</h1>
            <p>데이터베이스와 세션을 활용한 회원가입과 로그인 처리</p>
        </div>
            
    <?php
        $id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
        $name = isset($_SESSION["name"]) ? $_SESSION["name"] : "";
        if(!$id){
        // if(로그인 하지 않은 사용자의 요쳥이면)
    ?>

    <button class="btn btn-primary" onclick="location.href='login_main.php'">로그인</button>
    <button class="btn btn-danger" onclick="location.href='register_form.php'">회원가입</button>

    <?php
    }else {
    ?>
    <h3> <?= $name ?>님 안녕하세요.</h3>
    <button class="btn btn-primary" onclick="location.href='logout2.php'">로그아웃</button>
    <button class="btn btn-danger" onclick="location.href='update_form.php'">회원정보 수정</button>
    <?php
    }
    ?>
    </div>
</body>
</html>