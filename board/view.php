<?php
    //특정 글의 상세보기
        require_once("BoardDao.php");
        require_once("tools.php");

        /*
            request에서 글의 id를 추출
            해당 번호의 글을 읽고, 조회수를 1 증가
            읽은 글을 출력
        */

        $num = requestValue('num');
        
        $dao = new BoardDao();
        $msg = $dao->getMsg($num);
        $dao->increseHits($num);
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

        <script>
            function delReq(){
                var delete = confirm("정말 삭제하시겠습니까?");
                
                if(delete == false){
                    return
                }else{
                    location.href("delete.php?num=" + num);
                }
            }
        </script>
    <title>Document</title>
</head>
<body>
    <div class="jumbotron">
        <h2>게시글 상세 정보</h2>
        <table>
            <tr>
                <th>제목
                    <td><?= $msg["Title"]?></td>
                </th>
            </tr>
            <tr>
                <th>작성자
                    <td><?= $msg["Writer"]?></td>
                </th>
            </tr>
            <tr>
                <th>작성일시
                    <td><?= $msg["Regtime"]?></td>
                </th>
            </tr>
            <tr>
                <th>조회수
                    <td><?= $msg["Hits"]?></td>
                </th>
            </tr>
            <tr>
                <th>내용
                    <td><?= $msg["Content"]?></td>
                </th>
            </tr>
        </table>
    </div>
    <input type="button" class="btn btn-primary" onclick="location.href='board.php'" value="목록">
    <input type="button" class="btn btn-success" onclick="location.href='modify_form.php'" value="수정">
    <input type="button" class="btn btn-warning" onclick="delReq(<?= $msg['Num'] ?>)" value="삭제">
</body>
</html>