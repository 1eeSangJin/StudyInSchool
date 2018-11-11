@extends('app')

@section('content')
    <div class = "column" id = "content">
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

        <fieldset>
            <h3 class = "ui huge header">인기글</h3>
        
            <table class="ui single line striped selectable table">
                <thead>
          
                </thead>
                <tbody>
                      
                </tbody>
            </table>
        </fieldset>
        <br>
        <div class = "ui divider"></div>
        <br>
        <fieldset>
            <h3 class = "ui huge header">최신글</h3>
          
            <table class="ui single line striped selectable table">
                <thead>
                      
                </thead>
                <tbody>
                      
                </tbody>
            </table>

        </fieldset>
    </div>
@endsection