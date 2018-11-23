@extends('app')

@section('content')

    @if(Session::has('message'))
    <div class = "alert alert-info">
        {{Session::get('message')}}
    </div>
    @endif

    <div class = "column" id = "content">
        <div class = "ui hidden section divider"></div>
        <div class = "row">
        <h1 class = "ui huge header">
            컴퓨터정보계열
        </h1>
        </div>

        <div class = "ui divider"></div>
        <br>
        <div class = "row">
            <div id = "carouselExampleSlidesOnly" class = "carousel slide" data-ride = "carousel">
            <div class = "carousel-inner">
                <div class = "carousel-item active">
                    <img class = "d-block w-100" src = "/img/cominfo/cp.jpg" height="400px" alt = "첫번째 슬라이드">
                </div>
                <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/cominfo/japan.jpg" height="400px" alt = "두번째 슬라이드">
                </div>
                <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/cominfo/net.jpg" height="400px" alt = "세번째 슬라이드">
                </div>
                <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/cominfo/smartgame.jpg" height="400px" alt = "네번째 슬라이드">
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
                <th>추천수</th>
            </tr>
        </thead>
        <tbody>
            @foreach($msgs as $row)
                <tr>
                    <td>
                        {{$row['id']}}                             
                    </td>
                    <td>
                        <a href = "viewCominfo?id={{ $row['id'] }}&page={{ $page }}"> 
                        {{$row['title']}}
                        {{-- [{{ $count = $dao->countCommentComInfo($row['num']) }}]                     --}}
                        </a>
                    </td>
                    <td>
                        {{ $row['userNick'] }} [{{$row['affName']}}]                   
                    </td>
                    <td>
                        {{ $row['date'] }}                       
                    </td>
                    <td>
                        {{ $row['hits'] }}                             
                    </td>
                    <td>
                        {{ $row['recommend'] }}
                    </td>
                </tr>
                @endforeach                              
        </tbody>
    </table>
    <br>
    <div style="float:right;">
        <button type = 'button' class = 'ui secondary button' onclick = "location.href='writeCominfo_form'">글쓰기</button>
    </div>
@endsection