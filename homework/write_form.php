<?php
    /*************************************************************************************************
     * 작성자 : 1501204 이상진
     * 기능 : 글 쓰기 페이지
     * 설명 : 로그인 한 유저만 글을 쓸 수 있는 조건이 있기 때문에, 세션에 올라간 유저 정보가
     *        없을 시 로그인 하라는 경고창을 띄우고 메인페이지인 board.php로 넘어간다.
     *        로그인이 되어있을 시에는 글쓰기 페이지인 write_form.php로 넘어간다.
     *        우선 로그인 한 유저만 쓸 수 있기 때문에 작성자를 따로 쓸 필요가 없다. 그래서
     *        작성자 칸에는 세션에 올라가있는 유저의 닉네임을 띄우고, readonly로 수정은 할 수 없게 하였다. 
     *        또한 모든 칸에 required를 주어 모든 칸을 채워야 글 등록이 가능하게 하여 write.php에서 
     *        if문으로 한번 걸러줘야 하는 프로세스를 제거하였다.
     *************************************************************************************************/
    session_start();
    if(!isset($_SESSION['userNick'])){
        echo "<script>alert('로그인 후 글쓰기가 가능합니다.')</script>";
        echo "<script>location.replace('board.php');</script>";
    }
?>

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
    <div class="container">
    <h2>새 글쓰기 폼</h2>
    <p>아래의 모든 필드를 채워주세요</p>
    <form action="write.php" method="POST">
        <div class="form-group">
            <label for="title">제목:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="writer"> 작성자:</label>
            <input type="text" class="form-control" id="userNick" name="userNick" value="<?= $_SESSION["userNick"] ?>" required readonly>
        </div>
        <div class="form-group">
            <label for="content">내용:</label>
            <textarea class = "form-control" name="content" id="content" cols="30" rows="10" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">글 등록</button>
        <button type="button" class="btn btn-danger" onclick="location.href='board.php'">목록으로</button>
    </form>
</body>
</html>