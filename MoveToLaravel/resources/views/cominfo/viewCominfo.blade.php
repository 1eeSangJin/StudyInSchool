@extends('app')

@section('content')
<div class = "column" id = "content">
    <div class = "ui hidden section divider"></div>
    @if(Session::has('message'))
        <div class = "alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif
    <div>
        <h3>
        <span>{{ $msgs['title'] }} | 컴퓨터정보계열</span>
        </h3>
    </div>
    <div>
        <em>{{ $msgs['userNick'] }}</em> 
        <span>|</span>
        <span>{{ $msgs['created_at'] }}</span>
        <span style = "float:right;">{{ $msgs['recommend'] }}</span>
        <span style = "float:right; margin-right:1.5em">추천</span>
        <span style = "float:right; margin-right:1.5em">{{ $msgs['hits'] }}</span>
        <span style = "float:right; margin-right:1.5em">조회수</span>
        <span style = "float:right; margin-right:1.5em">{{ $msgs['id'] }}</span>
        <span style = "float:right; margin-right:1.5em">게시글 번호</span>
    </div>
    <div class = "ui divider"></div>

    <div id = "contents">
        <span style = "float:right;">
            <a href = "deleteCominfo?id={{ $msgs['id'] }}&page={{ $page }}" onclick = "return confirm('정말 삭제하시겠습니까?')" class = "ui secondary button">삭제</a>
            <button class = 'ui secondary button' onclick = "location.href='modifyCominfo_form?id={{ $msgs['id'] }}&page={{ $page }}'">수정</button>
            <button class = 'ui secondary button' onclick = "location.href='cominfoBoard?page={{ $page }}'">목록</button>
        </span>
        <br><br>
        <div>
            <?= $msgs['content'] ?>
        </div>
        <div class = "ui divider"></div>
        <br>
          
        <table>
            <td>
                <span>댓글 </span>
                <span> |&nbsp</span>
            </td>
            
            <td>
                <span>조회수 </span>
                <span>{{ $msgs['hits'] }} |&nbsp</span>
            </td>

            <td>
                <span>추천수 </span>
                <span>{{ $msgs['recommend']}} </span>
            </td>
        </table>

        {{-- <div class = "jumbotron"> --}}
            {{-- <table class = "ui celled table"> --}}
                {{-- @foreach($comments as $comment)  --}}
                {{-- <tr> --}}
                    {{-- <td> --}}
                    {{-- {{ $comment['userNick'] }} [{{ $comment['affName'] }}]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$comment['date'] }} --}}
                    {{-- <br> --}}
                    {{-- {{ $comment['comment'] }} --}}
                    {{-- </td> --}}
                {{-- </tr> --}}
                {{-- @endforeach> --}}
            {{-- </table> --}}
            {{-- <form action="comment?id=<?= $msgs['id'] ?>&page=<?= $page ?>" method="post"> --}}
                {{-- <textarea name="comment" id="comment" cols="130" rows="5"></textarea> --}}
                {{-- <button type="submit" style="width: 15%; height: 7.858em;">등록</button> --}}
            {{-- </form> --}}
        {{-- </div> --}}
        
    </div>
</div>
@endsection