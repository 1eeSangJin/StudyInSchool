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
                스마트경영계열 갤러리
            </h1>
        </div>

        <div class = "ui divider"></div>
        <br>
        <div class = "row">
            <div id = "carouselExampleControls" class = "carousel slide" data-ride = "carousel">
                <div class = "carousel-inner">
                    <div class = "carousel-item active">
                        <img class = "d-block w-100" src = "/img/smart/1.jpg" height="400px" alt = "첫번째 슬라이드">
                    </div>
                    <div class = "carousel-item">
                        <img class = "d-block w-100" src = "/img/smart/2.jpg" height="400px" alt = "두번째 슬라이드">
                    </div>
                    <div class = "carousel-item">
                        <img class = "d-block w-100" src = "/img/smart/3.jpg" height="400px" alt = "세번째 슬라이드">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
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
                            <a href = "viewSmart?id={{ $row['id'] }}&page={{ $currentPage }}"> 
                            {{$row['title']}}
                            [{{ $count[$i] }}]
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
                    @php
                        $i++;
                    @endphp
                    @endforeach
            </tbody>
        </table>

        <div style="float:right;">
        <button type = 'button' class = 'ui secondary button' onclick = location.href='writeSmart_form'>글쓰기</button>
        </div>
    </div>

    <ul class = "pagination">
        {{$msgs->links()}}
    </ul>
@endsection