@extends('app')

@section('content')
    <div class = "column" id = "content">
        <div class = "ui hidden section divider"></div>
        <div class = "row">
            <h1 class = "ui huge header">
                <img src="/img/yeungjin1.jpg">「YEUNGJIN INSIDE」에 오신것을 환영합니다.
            </h1>
        </div>
  
        <div class = "ui divider"></div>
        
        <br>
        <h3 class = "ui huge header">로그인</h3>
  
    <form action = "{{URL::to('/user/login')}}" method = "post">
            @csrf
            <div class = "ui huge input">
                <input type = "text" class = "form-control" name = "userId" id = "userId" placeholder = "아이디" required>
            </div>
            <button type = "button" class = "ui red button" onclick = "location.href='signup_page.html'">회원가입</button>
            <br>
            <br>
            <div class = "ui huge input">
                <input type = "password" class = "form-control" name = "userPw" id = "userPw" placeholder = "비밀번호" required>
            </div>
            <button type = "submit" class = "ui black button">로그인</button>
        </form>
    </div>
@endsection