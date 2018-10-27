<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>YEUNGJIN INSIDE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stylesheet/default.css">
    <link rel="stylesheet" type="text/css" href="../stylesheet/pandoc-code-highlight.css">
    <link rel="stylesheet" type="text/css" href="../stylesheet/semantic.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="../../semantic/semantic.min.js"></script>
</head>
<body>

  <?php
        session_start();

        require_once("../tools.php");
        require_once("../dao/boardDao.php");

        $page = requestValue("page");

        $dao = new boardDao();
        

        $NumOfEducate = $dao->getNumOfEducate();

        if($NumOfEducate > 0){
          $numPages = ceil($NumOfEducate / NUM_LINES);

          if($page < 1)
            $page = 1;
          if ($page > $numPages)
            $page = $numPages;

          $start = ($page - 1) * NUM_LINES;
          $msgs = $dao->getAlleducate($start, NUM_LINES);

          $firstLink = floor(($page - 1) / NUM_PAGE_LINKS) * NUM_PAGE_LINKS + 1;
          $lastLink = $firstLink + 1;
          if($lastLink > $numPages)
            $lastLink = $numPages;
        }
  ?>

  <header>
    <div class = "ui inverted huge borderless fixed fluid menu">
      <div class = "header item">YEUNGJIN INSIDE</div>
      <div class = "item" onclick = "location.href='../main.php'"><a>메인</a></div>
      <div class = "ui simple dropdown item">
        <span>계열·학과 갤러리</span>
        <i class = "dropdown icon"></i>
        <div class = "menu">
          <div class = "header">계열·학과</div>

          <div class = "item">
            <span onclick = "location.href='../cominfo/cominfoBoard.php'">컴퓨터정보계열</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../commachine/commachineBoard.php'">컴퓨터응용기계계열</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../electinfo/electinfoBoard.php'">전자정보통신계열</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../energy/energyBoard.php'">신재생에너지전기계열</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../build/buildBoard.php'">건축인테리어디자인계열</span>
          </div>          

          <div class = "item">
            <span onclick = "location.href='../smart/smartBoard.php'">스마트경영계열</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../seesighting/seesightingBoard.php'">국제관광조리계열</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../soldier/soldierBoard.php'">부사관계열</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../contents/contentsBoard.php'">콘텐츠디자인과</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../welfare/welfareBoard.php'">사회복지과</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../educate/educateBoard.php'">유아교육과</span>
          </div>

          <div class = "item">
            <span onclick = "location.href='../nurse/nurseBoard.php'">간호학과</span>
          </div>

        </div>
      </div>

      <div class = "item" onclick = "location.href='../notice/noticeBoard.php'"><span>공지사항</a></div>

      <div class = "right menu">
        <?php
          if(!isset($_SESSION['userId'])){       
            echo "<a class = 'item' onclick = location.href='../user/login_form.php'>로그인</a>";         
            echo "<a class = 'item' onclick = location.href='../user/signup_page.php'>회원가입</a>";     
          }else if($_SESSION['userNick'] == "Administrator"){
            $user_nick = $_SESSION['userNick'];
            $user_aff = $_SESSION['affName'];
            echo "<div class = 'item'>직책 : <strong>「 $user_aff 」</strong></div>"; 
            echo "<div class = 'item'><strong>$user_nick</strong> 님 환영합니다.</div>";
            echo "<a class = 'item' onclick = location.href='../user/userInfo.php'>유저항목</a>";
            echo "<a class = 'item' onclick = location.href='../user/logout.php'>로그아웃</a>";   
          }else{
            $user_nick = $_SESSION['userNick'];             
            $user_aff = $_SESSION['affName'];
            echo "<div class = 'item'>전공 : <strong>「 $user_aff 」</strong></div>"; 
            echo "<div class = 'item'><strong>$user_nick</strong> 님 환영합니다.</div>";
            echo "<a class = 'item' onclick = location.href='../user/modifyUser_form.php'>회원정보 수정</a>";
            echo "<a class = 'item' onclick = location.href='../user/logout.php'>로그아웃</a>";     
          }
        ?>
      </div>
    </div>
    
    </header>

    <div class = "column" id = "content">

      <div class = "ui hidden section divider"></div>
      <div class = "row">
        <h1 class = "ui huge header">
          유아교육과 갤러리
        </h1>
      </div>

      <div class = "ui divider"></div>

      <div class = "row">
        <div class = "column" id = "sidebar">
          <div id = "carouselExampleSlidesOnly" class = "carousel slide" data-ride = "carousel">
            <div class = "carousel-inner">
              <div class = "carousel-item active">
                <img class = "d-block w-100" src = "../img/yj1.jpg" alt = "첫번째 슬라이드">
              </div>
              <div class = "carousel-item">
                <img class = "d-block w-100" src = "../img/yj3.PNG" alt = "두번째 슬라이드">
              </div>
              <div class = "carousel-item">
                <img class = "d-block w-100" src = "../img/yj2.PNG" alt = "세번째 슬라이드">
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php if($NumOfEducate > 0) : ?>
        <table class="ui single line striped selectable table">
          <thead>
            <tr>
              <th>번호</th>
              <th>제목</th>
              <th>글쓴이</th>
              <th>날짜</th>
              <th>조회</th>
              <!-- <th>추천수</th> -->
            </tr>
          </thead>
          <tbody>
          <?php error_reporting(0) ?>
            <?php foreach($msgs as $row) : ?>                         <!-- 리턴받은 $msgs를 $row라는 변수에 연관배열로 받는다. 끝까지 받으면 종료됨 -->
              <tr>
                <td>
                  <?= $row['num'] ?>                              <!-- num에 있는 값을 출력한다. -->
                </td>
                <td>
                  <a href = "viewEducate_form.php?num=<?= $row['num'] ?>&page=<?= $page ?>"> <!-- 게시글 상세보기 링크를 단다. -->
                    <?= $row['title'] ?>[<?= $count = $dao->countCommentEducate($row['num']); ?>]                        <!-- title에 있는 값을 출력한다. -->
                  </a>
                </td>
                <td>
                  <?= $row['userNick'] ?> [<?= $row['affName'] ?>]                         <!-- userNick에 있는 값을 출력한다. -->
                </td>
                <td>
                  <?= $row['date'] ?>                             <!-- date에 있는 값을 출력한다. -->
                </td>
                <td>
                  <?= $row['hits'] ?>                             <!-- hits에 있는 값을 출력한다. -->
                </td>
              </tr>
            <?php endforeach ?>                                         <!-- foreach문 종료 -->
          </tbody>
        </table>
        
        <br>
        <?php if($firstLink > 1) : ?>
          <a href="<?= bdUrl('educateBoard.php', 0, $page - NUM_PAGE_LINKS) ?>"><</a>&nbsp;
        <?php endif ?>

        <?php for($i = $firstLink; $i <= $lastLink; $i++) : ?>
          <?php if($i == $page) : ?>
            <a href="<?= bdUrl('educateBoard.php', 0 , $i) ?>"><b><?= $i ?></b></a>&nbsp;
          <?php else : ?>
            <a href="<?= bdUrl('educateBoard.php', 0 , $i) ?>"><?= $i ?></a>&nbsp;
          <?php endif ?>
        <?php endfor ?>
        
        <?php if( $lastLink < $numPages) : ?>
          <a href="<?= bdUrl('educateBoard.php', 0 , $page + NUM_PAGE_LINKS) ?>">></a>
        <?php endif ?>

      <?php endif ?>

        <div style="float:right;">
          <button type = 'button' class = 'ui secondary button' onclick = location.href='writeEducate_form.php'>글쓰기</button>
        </div>
    </div>

      <style type="text/css">
        html{
          height: 100%;
        }
        body {
          display: relative;
          height: 100%;
        }

        
        #sidebar {
          position: fixed;
          top: 51.8px;
          left: 0;
          bottom: 0;
          width: 18%;
          background-color: #f5f5f5;
          padding: 0px;
        }
        #sidebar .ui.menu {
          margin: 2em 0 0;
          font-size: 16px;
        }
        #sidebar .ui.menu > a.item {
          color: #337ab7;
          border-radius: 0 !important;
        }
        #sidebar .ui.menu > a.item.active {
          background-color: #337ab7;
          color: white;
          border: none !important;
        }
        #sidebar .ui.menu > a.item:hover {
          background-color: #4f93ce;
          color: white;
        }
        
        #content {
          margin-left: 19%;
          width: 75%;
          margin-top: 3em;
          padding-left: 3em;
          float: left;
        }
        #content > .ui.grid {
          padding-right: 4em;
          padding-bottom: 3em;
        }
        #content h1 {
          font-size: 36px;
        }
        #content .ui.divider:not(.hidden) {
          margin: 0;
        }
        #content table.ui.table {
          border: none;
        }
        #content table.ui.table thead th {
          border-bottom: 2px solid #eee !important;
        }

      </style>
    </body>
  </html>
  