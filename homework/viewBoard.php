<?php
    require_once("BoardDao.php");
    require_once("tools.php");

    session_start();

    if(!isset($_SESSION['userId']) || !isset($_SESSION['userNick'])){
        echo "<script>alert('로그인 후 볼 수 있습니다.')</script>";

        echo "<script>location.replace('board.php');</script>";
    }
    else{
        $num = requestValue('num');
        
        $dao = new BoardDao();
        $msg = $dao->getBoard($num);
        $dao->increseHits($num);
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
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
    <div class="jumbotron">
        <h2>게시글 상세 정보</h2>
        <table>
            <tr>
                <th>제목
                    <td><?= $msg["title"]?></td>
                </th>
            </tr>
            <tr>
                <th>작성자
                    <td><?= $msg["userNick"]?></td>
                </th>
            </tr>
            <tr>
                <th>작성일시
                    <td><?= $msg["date"]?></td>
                </th>
            </tr>
            <tr>
                <th>조회수
                    <td><?= $msg["hits"]?></td>
                </th>
            </tr>
            <tr>
                <th>내용
                    <td><?= $msg["content"]?></td>
                </th>
            </tr>
        </table>
    </div>
    <input type="button" class="btn btn-primary" value="목록" onclick="location.href='board.php'">
    <input type="button" class="btn btn-success"  value="수정" onclick="location.href='modify_form.php?num=<?= $msg['num'] ?>'">
    <input type="button" class="btn btn-warning"  value="삭제" onclick="location.href='delete.php?num=<?= $msg['num'] ?>'" >
</body>
</html>