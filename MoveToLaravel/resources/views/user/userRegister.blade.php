@extends('app')

@section('content')
    <div class = "column" id = "content">
    <div class = "ui hidden section divider"></div>
    <div class = "row">
      <h1 class = "ui huge header">
        <img src="/img/yeungjin1.jpg" alt="">「YEUNGJIN INSIDE」 회원가입
      </h1>
    </div>

    <br>
    @if (count($errors) > 0)
        @foreach($errors->all() as $error)
            <p class = "alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    <form action = "{{ route('register') }}" method = "post" class = "ui form">
        @csrf
        <h2 class = "ui dividing header">회원 정보 기입</h2>

        <div class = "field">
            <label>{{ __('아이디') }}</label>
            <div class = "four wide field">
                <input type = "text" name = "userId" id = "userId" placeholder = "아이디" value = "{{old('userId')}}" required>
                @if ($errors->has('userId'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class = "field">
            <label>{{ __('비밀번호') }}</label>
            <div class = "four wide field">
                <input type = "password" name = "password" id = "password" placeholder = "비밀번호" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class = "field">
            <label>{{ __('이메일 주소') }}</label>
            <div class = "four wide field">
                <input type="email" name="email" id="email" placeholder class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value = "{{old('email')}}">
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            </div>
        </div>

        <div class = "field">
            <label>{{ __('닉네임') }}</label>
            <div class = "four wide field">
                <input type = "text" name = "userNick" id = "userNick" placeholder = "닉네임" value = "{{old('userNick')}}" required>
                @if ($errors->has('userNick'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('userNick') }}</strong>
                </span>
            @endif
            </div>
        </div>

        <div class = "field">
                <label>{{ __('이름') }}</label>
            <div class = "four wide field">
                <input type = "text" name = "name" id = "name" placeholder = "이름" class = "form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value = "{{old('name')}}" required>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            </div>
        </div>

        <div class = "field">
            <label>{{ __('성별') }}</label>
            <div class = "four wide field">
                <select class = "ui fluid dropdown" name = "sex" id = "sex" required>
                    <option value selected>성별</option>
                    <option value = "male">남자</option>
                    <option value = "female">여자</option>
                </select>
            </div>
            @if ($errors->has('sex'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sex') }}</strong>
            </span>
        @endif
        </div>

        <div class = "field">
            <label>{{ __('휴대전화') }}</label>
            <div class = "four wide field">
                <input type = "tel" name = "userPhone" id = "userPhone" placeholder = "전화번호 입력( - 를 함께 입력해주세요)" value = "{{old('userPhone')}}" required>
            </div>
            @if ($errors->has('userPhone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('userPhone') }}</strong>
            </span>
        @endif
        </div>

        <div class = "field">
            <label>{{ __('계열/학과') }}</label>
            <div class = "two fields">
                <div class = "field">
                    <select class = "ui fluid dropdown" name="affNum" id="affNum">
                        <option value selected>계열/학과</option>
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
                        <option value = "902">콘텐츠 - 인터넷광고마케팅</option>
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
            @if ($errors->has('affNum'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('affNum') }}</strong>
            </span>
            @endif
        </div>
        <button type = "submit" class = "ui secondary button">회원가입</button>
    </form>
@endsection
