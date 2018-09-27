<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        a:hover {
            text-decoration:none;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="jumbotron">
    <h2>게시글 리스트</h2>

    <?php
        require_once("tools.php");
        require_once("BoardDao.php");
      /*
       * 1. DB에 등록된 게시글 리스트를 인출(boardDao에게 요청) 
       *    <table>
       *        <tr>
       *            <td>번호</td>
       *            <td>제목</td>
       *            <td>작성자</td>
       *            <td>작성일시</td>
       *            <td>조회수</td>
       *        </tr>
       * 2. 2차원 배열로 반환된 게시글 리스트 각각에 대해 
       *    2-1. HTML 문서를 동적으로 생성
       *            <tr>
       *                <td></td>
       *                <td></td>
       *            /<tr>
       * 3. </table>
       * 
       * 4. 글쓰기 버튼 생성
       */
      $dao = new BoardDao();
      $msgs = $dao->getManyMsgs();


    ?>
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
                    <?= $row["Num"]?>
                </td>
                <td>
                    <a href="view.php?num=<?=$row["Num"] ?>"> <!-- 상세보기 코드 -->
                        <?= $row["Title"]?>
                    </a>
                </td>
                <td>
                    <?= $row["Writer"]?>
                </td>
                <td>
                    <?= $row["Regtime"]?>
                </td>
                <td>
                    <?= $row["Hits"]?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<input type="button" class = "btn btn-primary"value="글쓰기" onclick="location.href='write_form.php'">
</body>
</html>