<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <?php
        require_once('tools.php');
        $checking = requestValue('check');
        
        if($checking == 1){
    ?>
        <div class="jumbotron">
        <h1>로그인 성공 !</h1><br>
        <hr>
            <label><strong>ID : <?= $_SESSION['id']; ?></strong></label><br>
            <label><strong>NAME : <?= $_SESSION['name']; ?></strong></label><br>
            <hr>
            <a href="main.php" class="btn btn-light">메인페이지로</a>
            <a href="logout.php" class="btn btn-light">로그아웃</a>
        </div>
    <?php
        }else{
            ?>
                <div class="jumbotron">
                <h1>로그인 실패 !</h1></br>
                <hr>
                <a href="login_main.php" class="btn btn-light">로그인</a><br><br>
                <a href="register_form.php" class="btn btn-light">회원가입</a>
            <?php
        }
    ?>


</body>
</html>