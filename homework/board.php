<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        
    </script>
    <style>
        a:hover {
            text-decoration:none;
        }
    </style>
    <title>메인페이지</title>
</head>
<body>
    <?php
        session_start();

        require_once("tools.php");
        require_once("boardDao.php");

        $dao = new boardDao();
        $msgs = $dao->getAllboard();
    ?>
    <div class="jumbotron">
        <p align="right">
            <?php
                    if(!isset($_SESSION['userId']) || !isset($_SESSION['userNick'])){
                        echo "<button type='submit' class='btn btn-dark' onclick=location.href='login_form.php'>로그인</button>";
                        echo "<button type='button' class='btn btn-primary' onclick=location.href='regist_form.php'>회원가입</button>";
                    }
                    else{
                        $user_id = $_SESSION['userId'];
                        $user_nick = $_SESSION['userNick'];
                    
                        echo "<strong>$user_nick</strong> 님 환영합니다.";
                        echo "<button onclick=location.href='logout.php' class='btn btn-danger'>로그아웃</a></button>";
                    }
            ?>
        </p>
        <h2>게시글 리스트</h2>
        <p align="right"><input type="button" value="글쓰기" class="btn btn-primary" id="write" onclick="location.href='write_form.php'"></p>
        <table class="table table-hover">
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일시</th>
                <th>조회수</th>
            </tr>
            <?php foreach($msgs as $row) : ?>
                <tr>
                    <td>
                        <?= $row['num'] ?>
                    </td>
                    <td>
                        <a href="viewBoard.php?num=<?= $row['num'] ?>">
                            <?= $row['title'] ?>
                        </a>
                    </td>
                    <td>
                        <?= $row['userNick'] ?>
                    </td>
                    <td>
                        <?= $row['date'] ?>
                    </td>
                    <td>
                        <?= $row['hits'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>