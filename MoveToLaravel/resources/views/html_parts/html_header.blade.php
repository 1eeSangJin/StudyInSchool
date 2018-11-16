<div id = 'app'>
    <div class = "column" id = "content">
        <div class = "ui inverted huge borderless fixed fluid menu">
            <div class = "header item">YEUNGJIN INSIDE</div>
            <div class = "item" onclick = "location.href='../main'"><a>메인</a></div>
            <div class = "ui simple dropdown item">
                <span>계열·학과 갤러리</span>
                <i class = "dropdown icon"></i>
                <div class = "menu">
                <div class = "header">계열·학과</div>

                <div class = "item">
                    <span onclick = "location.href='../cominfo/cominfoBoard'">컴퓨터정보계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../commachine/commachineBoard'">컴퓨터응용기계계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../electinfo/electinfoBoard'">전자정보통신계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../energy/electBoard'">신재생에너지전기계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../build/buildBoard'">건축인테리어디자인계열</span>
                </div>          

                <div class = "item">
                    <span onclick = "location.href='../smart/smartBoard'">스마트경영계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../seesighting/seesightingBoard'">국제관광조리계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../soldier/soldierBoard'">부사관계열</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../contents/contentsBoard'">콘텐츠디자인과</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../welfare/welfareBoard'">사회복지과</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../educate/educateBoard'">유아교육과</span>
                </div>

                <div class = "item">
                    <span onclick = "location.href='../nurse/nurseBoard'">간호학과</span>
                </div>

            </div>
        </div>

        <div class = "item" onclick = "location.href='../notice/noticeBoard'"><span>공지사항</a></div>

            <div class = "right menu">
                    
                    {{-- if(!isset($_SESSION['userId'])){       
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
                    } --}}
                  
                @guest
                <a class = "item" href="../user/loginForm">{{ __('로그인') }}</a>
                    @if (Route::has('register'))
                        <a class = "item" href="../user/userRegister">{{ __('회원가입') }}</a>
                    @endif
                @else
                    <div class = 'item'>전공</div>
                    <div class = 'item'><strong>{{ Auth::user()->name }}</strong>님 환영합니다.</div>
                    <a class = 'item' href="">{{ __('회원정보 수정') }}</a>
                    <a class = 'item' href="{{ route('logout') }}">{{ __('로그아웃') }}</a>
                @endguest
            </div>
        </div>
    </div>
</div> 