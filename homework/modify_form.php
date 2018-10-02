<!DOCTYPE html>
<!--  
    작성자 : 1501204 이상진
    기능 : 사용자의 닉네임 정보와 게시글을 쓴 작성자의 닉네임 정보를 비교해
           수정의 가능 여부를 확인하고, 수정을 할 수 있게 하는 기능
    설명 : 그 게시글의 num값을 $num에 받아 dao에 있는 checkUser에 넘겨준다
           그 후 그 게시글을 쓴 유저의 닉네임을 받아 $userNick에 넘긴다.
           다음 세션에 있는(로그인 되어 있는) 사용자의 닉네임과 글을 쓴 닉네임을 비교하여
           같을 시에 수정을 할 수 있게 하고 다를 시 본인만 수정할 수 있다는 경고창을 띄우고
           board.php 화면으로 돌아간다.

 -->
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
    session_start();

    require_once("boardDao.php");
    require_once("tools.php");

    $num = requestValue('num');
    $dao = new boardDao();
    $userNick = $dao->checkUser($num);

    foreach($userNick as $check){
        if($_SESSION['userNick'] == $check['userNick']){
            $getMsg = $dao->getBoard($num);
        }else{
            echo "<script>alert('본인만 수정할 수 있습니다.')</script>";
            echo "<script>location.replace('board.php');</script>";
        }
    }
?>

    <div class="container">
    <h2>글 수정 폼</h2>
    <p>아래의 모든 필드를 채워주세요</p>
    <form action="modify.php?num=<?= $num ?>" method="POST">
        <div class="form-group">
            <label for="title">제목:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $getMsg["title"] ?>">
        </div>
        <div class="form-group">
            <label for="writer"> 작성자:</label>
            <input type="text" class="form-control" id="writer" name="userNick" value="<?= $getMsg["userNick"] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="content">내용:</label>
            <textarea class = "form-control" name="content" id="content" cols="30" rows="10"><?= $getMsg["content"] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">수정하기</button>
        <button type="button" class="btn btn-danger" onclick="location.href='board.php'">돌아가기</button>
    </form>
    </div>
</body>
</html>