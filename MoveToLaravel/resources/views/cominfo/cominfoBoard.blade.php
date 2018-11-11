@extends('app')

@section('content')
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
                    <img class = "d-block w-100" src = "/img/cominfo/net.jpg" height="400px" alt = "네번째 슬라이드">
                </div>
            </div>
        </div>
    </div>

    @if($NumOfCominfo > 0)
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
                <?php error_reporting(0) ?>
                    @foreach($msgs as $row)
                    <tr>
                        <td>
                            {{$row['num']}}                             
                        </td>
                        <td>
                            <a href = "viewCominfo?num={{ $row['num'] }}&page={{ $page }}"> 
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
        @if($firstLink > 1)
            <a href="<?= bdUrl('cominfoBoard', 0, $page - NUM_PAGE_LINKS) ?>"><</a>&nbsp;
        @endif
        @for($i = $firstLink; $i <= $lastLink; $i++)
                @if($i == $page)
                <a href="<?= bdUrl('cominfoBoard', 0 , $i) ?>"><b><?= $i ?></b></a>&nbsp;
                @else
                <a href="<?= bdUrl('cominfoBoard', 0 , $i) ?>"><?= $i ?></a>&nbsp;
                @endif
        @endfor
          
        @if( $lastLink < $numPages)
            <a href="<?= bdUrl('1', 0 , $page + NUM_PAGE_LINKS) ?>">></a>
        @endif
  
    @endif
    <div style="float:right;">
        <button type = 'button' class = 'ui secondary button' onclick = "location.href='writeCominfo_form'">글쓰기</button>
    </div>
@endsection