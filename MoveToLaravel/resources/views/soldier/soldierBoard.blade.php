<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>YEUNGJIN INSIDE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/pandoc-code-highlight.css">
    <link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="/css/section.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous">
    </script>
    <script src="/css/semantic/semantic.min.js"></script>
<body>
    <header>
        <div class = "ui inverted huge borderless fixed fluid menu">
            <div class = "header item">YEUNGJIN INSIDE</div>
            <div class = "item" onclick = "location.href='main'"><a>메인</a></div>
            <div class = "ui simple dropdown item">
                <span>계열·학과 갤러리</span>
                <i class = "dropdown icon"></i>
                <div class = "menu">
                <div class = "header">계열·학과</div>

                <div class = "item">
                    <span onclick = "location.href='cominfoBoard'">컴퓨터정보계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='commachineBoard'">컴퓨터응용기계계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='electinfoBoard'">전자정보통신계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='energyBoard'">신재생에너지전기계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='buildBoard'">건축인테리어디자인계열</span>
                </div>          

                <div class = "item">
                    <span onclick = "location.href='smartBoard'">스마트경영계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='seesightingBoard'">국제관광조리계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='soldierBoard'">부사관계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='contentsBoard'">콘텐츠디자인과</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='welfareBoard'">사회복지과</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='educateBoard'">유아교육과</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='nurseBoard'">간호학과</span>
                </div>

                </div>
            </div>
            <div class = "item" onclick = "location.href='noticeBoard'"><span>공지사항</a></div>

            <div class = "right menu">
                
                    <!-- if(!isset($_SESSION['userId'])){       
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
                    } -->
                
                <a class = 'item' onclick = "location.href='login_form'">로그인</a>
                <a class = 'item' onclick = "location.href='signup_page'">회원가입</a>
            </div>
        </div>
    </header>

    <section>
        <div class = "column" id = "content">
            <div class = "ui hidden section divider"></div>
            <div class = "row">
            <h1 class = "ui huge header">
                부사관계열 갤러리
            </h1>
            </div>

            <div class = "ui divider"></div>
            <br>
            <div class = "row">
                <div id = "carouselExampleSlidesOnly" class = "carousel slide" data-ride = "carousel">
                <div class = "carousel-inner">
                    <div class = "carousel-item active">
                    <img class = "d-block w-100" src = "/img/yg1.jpg" height="400px" alt = "첫번째 슬라이드">
                    </div>
                    <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/yg3.PNG" height="400px" alt = "두번째 슬라이드">
                    </div>
                    <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/yg2.jpg" height="400px" alt = "세번째 슬라이드">
                    </div>
                </div>
            </div>
        </div>

        <table class="ui single line striped selectable table">
            <thead>
                <tr>
                <th>번호</th>
                <th>제목</th>
                <th>글쓴이</th>
                <th>날짜</th>
                <th>조회</th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div style="float:right;">
          <button type = 'button' class = 'ui secondary button' onclick = location.href='writeBuild_form'>글쓰기</button>
        </div>
    </section>

</body>
</html>