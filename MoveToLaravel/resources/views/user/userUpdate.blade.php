@extends('app')

@section('content')
    @if(!Auth::check())
        <script>
            alert('부적절한 접근입니다.');
            location.href='../main';
        </script>
    @else
        <div class = "column" id = "content">
            <div class = "ui hidden section divider"></div>
            <div class = "row">
            <h1 class = "ui huge header">
                「YEUNGJIN INSIDE」 회원정보 수정
            </h1>
            </div>

            <br>

            <form action = "userUpdate" method = "post" class = "ui form">
                @csrf
                <h2 class = "ui dividing header">회원정보 수정</h2>

                <div class = "field">
                    <label>아이디(수정불가)</label>
                    <div class = "four wide field">
                        <input type = "text" name = "userId" id = "userId" value = "{{Auth::user()->userId}}" readonly required>
                    </div>
                </div>

                <div class = "field">
                    <label>비밀번호</label>
                    <div class = "four wide field">
                        <input type = "password" name = "password" id = "password" required>
                    </div>
                </div>

                <div class = "field">
                    <label>이메일 주소</label>
                    <div class = "four wide field">
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
                    </div>
                </div>

                <div class = "field">         
                    <label>닉네임</label>   
                    <div class = "four wide field">
                        <input type = "text" name = "userNick" id = "userNick" value = "{{ Auth::user()->userNick }}" required>
                    </div>
                </div>

                <div class = "field">
                    <label>휴대전화</label>
                    <div class = "four wide field">
                        <input type = "tel" name = "userPhone" id = "userPhone" value = "{{ Auth::user()->userPhone }}" required>
                    </div>
                </div>

                <button type = "submit" class = "ui secondary button">정보수정</button>
                <button type = "button" class = "ui secondary button" onclick = "location.href='main.php'">돌아가기</button>
                <a href="deleteUser" onclick="return confirm('회원정보를 삭제하시겠습니까?')" class="ui negative button">회원정보 삭제</a>
            </form>
        </div>
    @endif
@endsection