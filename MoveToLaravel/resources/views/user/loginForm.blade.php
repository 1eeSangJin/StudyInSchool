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

        @if (count($errors) > 0)
        @foreach($errors->all() as $error)
            <p class = "alert alert-danger">{{$error}}</p>
        @endforeach
        @endif
  
        <form action = "{{ route('login') }}" method = "post">
            @csrf
            <div class = "ui huge input">
                <input type = "text" class = "form-control" name = "userId" id = "userId" placeholder = "아이디" required>
            </div>
            <button type = "button" class = "ui red button" onclick = "location.href='signup_page.html'">회원가입</button>
            <br><br>
            <div class = "ui huge input">
                <input type = "password" class = "form-control" name = "password" id = "password" placeholder = "비밀번호" required>
            </div>
            <button type = "submit" class = "ui black button">로그인</button>
        </form>
    </div>
@endsection