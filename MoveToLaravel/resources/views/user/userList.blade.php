@extends('app')

@section('content')
    <div class = "column" id = "content">
        <div class = "ui hidden section divider"></div>
        @if(Session::has('message'))
            <div class = "alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif

        <div class = "row">
            <h1 class = "ui huge header">
                회원목록 및 관리
            </h1>
        </div>

        <table class="ui single line striped selectable table">
            <thead>
                <tr>
                    <th>회원 번호</th>
                    <th>이름</th>
                    <th>이메일 주소</th>
                    <th>아이디</th>
                    <th>닉네임</th>
                    <th>성별</th>
                    <th>전화번호</th>
                    <th>학과번호</th>
                    <th>기능</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $row)
                    @php
                        $id = $row['id'];
                    @endphp
                    <tr>
                        <td>{{$row['id']}}</td>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['email']}}</td>
                        <td>{{$row['userId']}}</td>
                        <td>{{$row['userNick']}}</td>
                        @if($row['sex'] == 'male')
                            <td>남자</td>
                        @else
                            <td>여자</td>
                        @endif
                        <td>{{$row['userPhone']}}</td>
                        <td>{{$row['affNum']}}</td>
                        <td>
                            <button type = 'submit' class = 'ui secondary button' onclick = location.href="updateUser?id={{$id}}">수정</button>
                        </td>
                        <td>
                            <form action="del?id={{$id}}" method="post">
                                @csrf
                                <button type = 'submit' class = 'ui secondary button'>삭제</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </div>

@endsection