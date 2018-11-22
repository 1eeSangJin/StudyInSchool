@extends('app')

@section('content')
    <div class = "column" id = "content">
        <div class = "ui hidden section divider"></div>
        <div class = "row">
        <h1 class = "ui huge header">
            콘텐츠디자인과 갤러리
        </h1>
        </div>

        <div class = "ui divider"></div>
        <br>
        <div class = "row">
            <div id = "carouselExampleSlidesOnly" class = "carousel slide" data-ride = "carousel">
            <div class = "carousel-inner">
                <div class = "carousel-item active">
                    <img class = "d-block w-100" src = "/img/contents/1.jpg" height="400px" alt = "첫번째 슬라이드">
                </div>
                <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/contents/2.jpg" height="400px" alt = "두번째 슬라이드">
                </div>
                <div class = "carousel-item">
                    <img class = "d-block w-100" src = "/img/contents/3.jpg" height="400px" alt = "세번째 슬라이드">
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
        </thead>
        <tbody>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div style="float:right;">
        <button type = 'button' class = 'ui secondary button' onclick = location.href='writeBuild_form'>글쓰기</button>
    </div>
@endsection