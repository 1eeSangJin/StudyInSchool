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
    <script src="../semantic/semantic.min.js"></script>
</head>
<body>

  <?php
        session_start();

        require_once("../tools.php");
        require_once("../dao/memberDao.php");

        if(!isset($_SESSION['userId'])){
            echo "<script>alert('로그인 되어있지 않습니다.');</script>";
            echo "<script>location.replace('login_page.html');</script>";
        }else{
            $userId = $_SESSION['userId'];
            $dao = new memberDao();
            $userInfo = $dao->getUser($userId);
        }
  ?>

  <header>
    <div class = "ui inverted huge borderless fixed fluid menu">
      <div class = "header item">YEUNGJIN INSIDE</div>
      <div class = "item" onclick = "location.href='main.php'"><a>메인</a></div>
      <div class = "ui simple dropdown item">
        <span>계열·학과 갤러리</span>
        <i class = "dropdown icon"></i>
        <div class = "menu">
          <div class = "header">계열·학과</div>

          <div class = "item">
            <span>컴퓨터정보계열</span>
          </div>

          <div class = "item">
            <span>컴퓨터응용기계계열</span>
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

      <div class = "item" onclick = "location.href='notice/noticeBoard.php'"><span>공지사항</a></div>

      <div class = "right menu">
        <?php
          if(!isset($_SESSION['userId'])){       
            echo "<a class = 'item' onclick = location.href='login_form.html'>로그인</a>";         
            echo "<a class = 'item' onclick = location.href='signup_page.html'>회원가입</a>";     
          }
          else{
            $user_nick = $_SESSION['userNick'];             
            $user_aff = $_SESSION['affName'];
            echo "<div class = 'item'>전공 : <strong>「 $user_aff 」</strong></div>"; 
            echo "<div class = 'item'><strong>$user_nick</strong> 님 환영합니다.</div>"; 
            echo "<a class = 'item' onclick = location.href='modifyUser_form.php'>회원정보 수정</a>";
            echo "<a class = 'item' onclick = location.href='logout.php'>로그아웃</a>";     
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
          「YEUNGJIN INSIDE」 회원정보 수정
        </h1>
      </div>

      <br>

        <form action = "modifyUser.php" method = "post" class = "ui form">
            <h2 class = "ui dividing header">회원정보 수정</h2>

            <div class = "field">
                <label>아이디(수정불가)</label>
                <div class = "four wide field">
                    <input type = "text" name = "userId" id = "userId" value = "<?= $userInfo['userId'] ?>" readonly required>
                </div>
            </div>

            <div class = "field">
                <label>비밀번호</label>
                <div class = "four wide field">
                    <input type = "password" name = "userPw" id = "userPw" value = "<?= $userInfo['userPw'] ?>" required>
                </div>
            </div>

            <div class = "field">
                <div class = "two fields">
                    <div class = "field">
                        <label>닉네임</label>
                        <input type = "text" name = "userNick" id = "userNick" value = "<?= $userInfo['userNick'] ?>" required>
                    </div>
                </div>
            </div>

            <div class = "field">
                <label>휴대전화</label>
                <div class = "four wide field">
                    <input type = "tel" name = "userPhone" id = "userPhone" value = "<?= $userInfo['userPhone'] ?>" required>
                </div>
            </div>

            <div class = "field">
                <label>계열/학과</label>
                <div class = "two fields">
                    <div class = "field">
                        <select class = "ui fluid dropdown" name="affNum" id="affNum" required>
                            <option value = "">계열/학과</option>
                            <option value = "101">컴정 - CP | 네트워크보안</option>
                            <option value = "102">컴정 - WD | 일본취업반</option>
                            <option value = "103">컴정 - GC | 특수영상반</option>
                            <option value = "201">컴응기 - CAD/기계설계</option>
                            <option value = "202">컴응기 - 금형/공작기계</option>
                            <option value = "203">컴응기 - 로봇자동화시스템</option>
                            <option value = "301">전자정보 - 전자정보</option>
                            <option value = "302">전자정보 - 솔라반도체</option>
                            <option value = "303">전자정보 - IT소재전공</option>
                            <option value = "401">신재생 - 에너지전기</option>
                            <option value = "402">신재생 - 전기화학</option>
                            <option value = "403">신재생 - 디지털전기</option>
                            <option value = "404">신재생 - 전기설비</option>
                            <option value = "501">건축 - 건축디자인</option>
                            <option value = "502">건축 - 실내건축디자인</option>
                            <option value = "503">건축 - 건축주문식교육</option>
                            <option value = "601">스마트경영 - 서비스OA</option>
                            <option value = "602">스마트경영 - 철도서비스</option>
                            <option value = "603">스마트경영 - 유통관리</option>
                            <option value = "604">스마트경영 - 전산세무회계</option>
                            <option value = "605">스마트경영 - 금융서비스</option>
                            <option value = "606">스마트경영 - PURDUE</option>
                            <option value = "607">스마트경영 - 재팬비지니스</option>
                            <option value = "701">국제관광 - 호텔해외취업</option>
                            <option value = "702">국제관광 - 특급호텔</option>
                            <option value = "703">국제관광 - 항공서비스</option>
                            <option value = "704">국제관광 - 항공에어부산</option>
                            <option value = "705">국제관광 - 글로벌조리</option>
                            <option value = "706">국제관광 - 일본관광서비스</option>
                            <option value = "707">국제관광 - 중국관광서비스</option>
                            <option value = "708">국제관광 - 글로벌관광</option>
                            <option value = "801">부사관 - 국방전자통신</option>
                            <option value = "802">부사관 - 의무/전투부사관</option>
                            <option value = "803">부사관 - 항공정비</option>
                            <option value = "804">부사관 - 공군부사관학군단</option>
                            <option value = "901">콘텐츠 - 시각영상디자인</option>
                            <option value = "902">콘텐츠 - 인터넷솽고마케팅</option>
                            <option value = "1001">사회복지 - 장애인복지</option>
                            <option value = "1002">사회복지 - 노인복지</option>
                            <option value = "1003">사회복지 - 가톨릭사회복지</option>
                            <option value = "1004">사회복지 - 보육교사전문</option>
                            <option value = "1101">유아교육 - 유아창의성교육</option>
                            <option value = "1102">유아교육 - 유아다문화교육</option>
                            <option value = "1201">간호 - 간호</option>
                        </select>
                    </div>
                </div> 
            </div>
            <button type = "submit" class = "ui secondary button">정보수정</button>
            <button type = "button" class = "ui secondary button" onclick = "location.href='main.php'">돌아가기</button>
            <a href="deleteUser.php?userId=<?= $userInfo['userId'] ?>" onclick="return confirm('회원정보를 삭제하시겠습니까?')" class="ui negative button">회원정보 삭제</a>
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
          width: 81%;
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
  