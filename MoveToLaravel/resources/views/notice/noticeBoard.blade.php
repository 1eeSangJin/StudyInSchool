@extends('app')

@section('content')
    <section>
        <div class = "column" id = "content">
            <div class = "ui hidden section divider"></div>
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

        @if(Auth::check() && Auth::user()->userNick == 'Administrator')
            <div style="float:right;">
                <button type = 'button' class = 'ui secondary button' onclick = location.href='writeBuild_form'>글쓰기</button>
            </div>
        @endif
    </section>
@endsection

</body>
</html>