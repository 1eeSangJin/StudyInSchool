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
                공지사항
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
                        <img class = "d-block w-100" src = "/img/yg3.jpg" height="400px" alt = "두번째 슬라이드">
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
                    <th>추천수</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach($msgs as $row)
                    <tr>
                        <td>
                            {{$row['id']}}                             
                        </td>
                        <td>
                            <a href = "viewNotice?id={{ $row['id'] }}&page={{ $currentPage }}"> 
                            {{$row['title']}}
                            [{{ $count[$i] }}]                    
                            </a>
                        </td>
                        <td>
                            {{ $row['userNick'] }} [관리자]                   
                        </td>
                        <td>
                            {{ $row['created_at'] }}                       
                        </td>
                        <td>
                            {{ $row['hits'] }}                             
                        </td>
                        <td>
                            {{ $row['recommend'] }}
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach  
            </tbody>
        </table>

        @if(Auth::check() && Auth::user()->userNick == 'Administrator')
            <div style="float:right;">
                <button type = 'button' class = 'ui secondary button' onclick = location.href='writeNotice_form'>글쓰기</button>
            </div>
        @endif
    </div>
    
    <ul class = "pagination">
        {{$msgs->links()}}
    </ul>
@endsection