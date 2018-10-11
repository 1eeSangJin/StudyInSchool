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

            $qurrentPage = requestValue("page");
            // http://localhost/php/board/board.php?page=-3
            if($currentPage<1){
                $currentPage = 1;
            }
            /*
            * currentPage는 주어지는 것이고 계산해야하는 것은 startPage, endPage, prevLink, newxtLink 
            */
            $dao = new BoardDao();

            //집단함수, aggregate function
            //select count(*) from board;
            $totalCount = $dao->getNumMsgs();

            if($totalCount > 0){
                $startPage = floor(($currentPage-1)/NUM_PAGE_LINKS) * NUM_PAGE_LINKS + 1;   //floor는 내림 함수
                $endPage = $startPage + NUM_PAGE_LINKS - 1;
                $totalPages = ceil($totalCount/NUM_LINES);
                // total page : ceil(전체 게시글 수 /NUM_LINES)

                if($endPage > $totalPages){
                    $endPage = $tatalPages;
                }

                if($startPage > 1){
                    $prev = true;
                }

                if($endPage < $totalPages){
                    $next = true;
                }
            }

            // select * from board order by regtime limit start, count

            /*
            * currentPage 1 : start = 0, count = NUM_LINES
            * currentPage 2 : start = NUM_LINES, count = MUM_LINES
            * currentPage 3 : start = NUM_LINES * 2, count = MUM_LINES
            * currentPage 4 : start = NUM_LINES * 3, count = MUM_LINES
            */

            $startRecord = ($currentPage-1) * NUM_LINES;

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

        $msgs = $dao->getMsgs4Page($startRecord, NUM_LINES);


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
</body>
</html>