<?php
    session_start();
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
<?php
    require_once("boardDao.php");
    require_once("tools.php");

    $num = requestValue('num');

    $dao = new boardDao();
    $getMsg = $dao->getBoard($num);
    /* 
     *  1. 클라이언트가 송신한 num값을 읽는다
     *  2. 그 값으로 해당하는 게시글을 읽는다.
     *  3. 그 게시글 정보를 이용해 html을 동적으로 생성한다. 
     * 
    */
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