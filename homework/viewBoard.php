<?php
    /****************************************************************************************
     * 작성자 : 1501204 이상진
     * 기능 : 게시글 상세보기
     * 설명 : 세션에 올라간 유저가 있는지 없는지 판단하여 로그인하지 않았으면
     *        경고창을 띄운 후 board.php로 돌아간다.
     *        만약 로그인이 되어있을 시 누른 게시글의 num값을 받아 $num에 저장한다.
     *        그 후 $num을 boardDao에 있는 getBoard에 보내 게시글의 상세 내용을 부른다.
     *        또한 $num을 boardDao에 있는 incoreaseHits에 보내 게시글의 조회수를 1 증가시킨다.
     ***************************************************************************************/
    require_once("BoardDao.php");
    require_once("tools.php");

    session_start();

    if(!isset($_SESSION['userNick'])){
        echo "<script>alert('로그인 후 볼 수 있습니다.')</script>";

        echo "<script>location.replace('board.php');</script>";
    }
    else{
        $num = requestValue('num');
        
        $dao = new boardDao();
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
        <h2>게시글 상세 정보</h2>                       <!-- boardDao에 있는 getBoard에서 $msg를 리턴받았다. -->
        <table>
            <tr>
                <th>제목
                    <td><?= $msg["title"]?></td>       <!-- title에 있는 값을 출력한다. -->
                </th>
            </tr>
            <tr>
                <th>작성자
                    <td><?= $msg["userNick"]?></td>    <!-- userNick에 있는 값을 출력한다. -->
                </th>
            </tr>
            <tr>
                <th>작성일시
                    <td><?= $msg["date"]?></td>        <!-- date에 있는 값을 출력한다. -->
                </th>
            </tr>
            <tr>
                <th>조회수
                    <td><?= $msg["hits"]?></td>        <!-- hits에 있는 값을 출력한다. -->
                </th>
            </tr>
            <tr>
                <th>내용
                    <td><?= $msg["content"]?></td>     <!-- content에 있는 값을 출력한다. -->
                </th>
            </tr>
        </table>
    </div>
    <!-- 
        목록을 누를 시 메인페이지인 board.php로 넘어간다.
        수정을 누를 시 modify_form.php에 num값을 넘겨 수정페이지로 넘어간다.
        삭제를 누를시 delete.php에 num값을 넘겨 삭제를 수행한다.  
    -->
    <input type="button" class="btn btn-primary" value="목록" onclick="location.href='board.php'">
    <input type="button" class="btn btn-success"  value="수정" onclick="location.href='modify_form.php?num=<?= $msg['num'] ?>'">
    <input type="button" class="btn btn-warning"  value="삭제" onclick="location.href='delete.php?num=<?= $msg['num'] ?>'" >
</body>
</html>