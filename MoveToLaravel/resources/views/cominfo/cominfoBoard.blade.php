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
                컴퓨터정보계열
            </h1>
        </div>

        <div class = "ui divider"></div>
        <br>
        <div class = "row">
            <div id = "carouselExampleControls" class = "carousel slide" data-ride = "carousel">
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
                    <div class = "carousel-item">
                        <img class = "d-block w-100" src = "/img/cominfo/vr.jpg" height="400px" alt = "다섯번째 슬라이드">
                    </div>
                    <div class = "carousel-item">
                        <img class = "d-block w-100" src = "/img/cominfo/wdb.jpg" height="400px" alt = "여섯번째 슬라이드">
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
                            <a href = "viewCominfo?id={{ $row['id'] }}&page={{ $currentPage }}"> 
                            {{$row['title']}}
                            [{{ $count[$i] }}]
                            </a>
                        </td>
                        <td>
                            {{ $row['userNick'] }} [{{$row['affName']}}]                   
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
        <br>
        <div style="float:right;">
            <button type = 'button' class = 'ui secondary button' onclick = "location.href='writeCominfo_form'">글쓰기</button>
        </div>
    </div>
    
    <ul class = "pagination">
        {{$msgs->links()}}
    </ul>
    
@endsection