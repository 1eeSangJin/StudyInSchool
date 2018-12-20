@extends('app')

@section('state')
    
@endsection

@section('content')
    <div class = "column" id = "content">
        <div class = "ui hidden section divider"></div>
        @if(Session::has('message'))
            <div class = "alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif

        <div class = "row">
            <div id = "carouselExampleSlidesOnly" class = "carousel slide" data-ride = "carousel">
            <div class = "carousel-inner">
                <div class = "carousel-item active">
                    <img class = "d-block w-100" src = "/img/yg1.jpg" height="400px" alt = "첫번째 슬라이드">
                </div>
                <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/yg2.jpg" height="400px" alt = "두번째 슬라이드">
                </div>
                <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/yg3.jpg" height="400px" alt = "세번째 슬라이드">
                </div>
            </div>
        </div>


            <h3 class = "ui huge header">최신글</h3>
            <table class="ui single line striped selectable table">
                <thead>
                    <tr>
                        <th>제목</th>
                        <th>글쓴이</th>
                        <th>날짜</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($latest as $row)
                            <tr>
                                <td>[{{ $dept_name[$i]}}]{{ $row['title'] }}</td>
                                <td>{{ $row['userNick'] }}</td>
                                <td>{{ $row['created_at'] }}</td>
                            </td>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>

        <br>
        <div class = "ui divider"></div>
        <br>

            <h3 class = "ui huge header">인기글</h3>
            <table class="ui single line striped selectable table">
                <thead>
                    <tr>
                        <th>제목</th>
                        <th>글쓴이</th>
                        <th>날짜</th>
                    </tr>
                </thead>
                <tbody>
                        
                </tbody>
            </table>
    </div>
@endsection