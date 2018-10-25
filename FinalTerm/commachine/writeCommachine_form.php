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
    <script src="../../semantic/semantic.min.js"></script>
    <script src="/nse/nse_files/js/HuskyEZCreator.js" charset="utf-8"></script>

    <script type="text/javascript">
        $(function(){
            var oEditors = [];
            nhn.husky.EZCreator.createInIFrame({
                oAppRef: oEditors,
                elPlaceHolder: "contents",
                sSkinURI: "/nse/nse_files/SmartEditor2Skin.html",
                htParams:{
                    bUseToolbar:true,
                    bUseVerticalResizer : true,
                    bUseModeChanger: true,
                },
                fCreator: "createSEditor2"
            });        

            $("#submit_button").click(function(){
                oEditors.getById["contents"].exec("UPDATE_CONTENTS_FIELD", []);

                $("#write_notice").submit();
            });

        });
    </script>
</head>
<body>

  <?php
        session_start();

        require_once("../tools.php");
        require_once("../dao/memberDao.php");

        if(!isset($_SESSION['userNick'])){
          echo "<script>alert('로그인이 필요합니다.')</script>";
          echo "<script>location.replace('cominfoBoard.php');</script>";
        }

        $userId = $_SESSION['userId'];
        $dao = new memberDao();
        $userInfo = $dao->getUser($userId);
        $getAff = $dao->getAff($userId);
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
            <span onclick = "location.href='../commachine/commachineBoard.php'"s>컴퓨터응용기계계열</span>
          </div>

          <div class = "item">
            <span>전자정보통신계열</span>
          </div>

          <div class = "item">
            <span>신재생에너지전기계열</span>
          </div>

          <div class = "item">
            <span>건축인테리어디자인계열</span>
          </div>          

          <div class = "item">
            <span>스마트경영계열</span>
          </div>

          <div class = "item">
            <span>국제관광조리계열</span>
          </div>

          <div class = "item">
            <span>부사관계열</span>
          </div>

          <div class = "item">
            <span>콘텐츠디자인과</span>
          </div>

          <div class = "item">
            <span>사회복지과</span>
          </div>

          <div class = "item">
            <span>유아교육과</span>
          </div>

          <div class = "item">
            <span>간호학과</span>
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

    <aside>
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
    </aside>

    <div class = "column" id = "content">
      <div class = "ui hidden section divider"></div>
      <div class = "row">
        <h1 class = "ui huge header">
          컴퓨터정보계열 갤러리
        </h1>
      </div>

      <br>

        <form action = "writeCommachine.php" id = "wirteNotice" name = "writeNotice" method = "post" class = "ui form">
            <h2 class = "ui dividing header">작성내용</h2>

            <div class = "two field">
                <label>작성자</label>
                <div class = "four wide field">
                    <input type = "text" name = "userNick" id = "userNick" value = "<?= $userInfo['userNick'] ?>" readonly required>
                </div>
                <label>소속</label>
                <div class = "four wide field">
                    <?php foreach($getAff as $affName) :?>
                    <input type="text" name = "affName" id = "affName" value = "<?= $affName['affName'] ?>" readonly>
                    <?php endforeach ?>
                </div>
            </div>

            <div class = "field">
                <label>제목</label>
                <div class = "twelve wide field">
                    <input type = "text" name = "title" id = "title" required>
                </div>
            </div>



            <div class="field">
                <label>내용</label>
                <textarea name = "contents" id = "contents" rows="15" cols="10"></textarea>
            </div>
            
            <button type = "submit" class = "ui secondary button" id = "submit_button">등록하기</button>
            <button type = "button" class = "ui secondary button" onclick = "location.href='cominfoBoard.php'">돌아가기</button>
        </form>
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
  