@extends('app')

@section('content')
<div class = "column" id = "content">
    <div class = "ui hidden section divider"></div>
    <div>
        <h3>
        <span><?= $msgs['title'] ?> | 공지사항</span>
        </h3>
    </div>
    <div>
        <em><?= $msgs['userNick'] ?></em> 
        <span>|</span>
        <span><?= $msgs['created_at'] ?></span>
        <span style = "float:right;"><?= $msgs['recommend'] ?></span>
        <span style = "float:right; margin-right:1.5em">추천</span>
        <span style = "float:right; margin-right:1.5em"><?= $msgs['hits'] ?></span>
        <span style = "float:right; margin-right:1.5em">조회수</span>
        <span style = "float:right; margin-right:1.5em"><?= $msgs['id'] ?></span>
        <span style = "float:right; margin-right:1.5em">게시글 번호</span>
    </div>
    <div class = "ui divider"></div>

    <div id = "contents">
        <span style = "float:right;">
            <a href = "deleteCominfo?id={{ $msgs['id'] }}&page={{ $page }}" onclick = "return confirm('정말 삭제하시겠습니까?')" class = "ui secondary button">삭제</a>
            <button class = 'ui secondary button' onclick = "location.href='modifyNotice_form?id={{ $msgs['id'] }}&page={{ $page }}'">수정</button>
            <button class = 'ui secondary button' onclick = "location.href='noticeBoard?page={{ $page }}'">목록</button>
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
                <span>{{$count}} |&nbsp</span>
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

        <div class = "jumbotron">
            <table class = "ui celled table" id = "commentTable" name = "commentTable">
                @php
                    $i = 1;   
                @endphp
                @foreach($comments as $comment)
                <tr>
                    <td id = {{ $i }}>
                    {{ $comment['userNick'] }} [{{ $comment['affName'] }}] <span style = "float:right;">{{$comment['created_at'] }}</span>
                    <br>
                    @if(Auth::check() && Auth::user()->userNick == $comment['userNick'])
                        <span style = "float:right;">
                            <a href = "#">수정 &nbsp;|&nbsp; </a>
                            <a href = "delComment?id={{ $i }}writer={{ $comment['userNick'] }}&date={{ $comment['created_at'] }}">삭제</a>
                        </span>
                    @endif
                    <br>
                    {{ $comment['comment'] }}
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </table>

            <textarea name="comment" id="comment" cols="140" rows="5"></textarea>
            <button id="submit" type="submit" style="width: 15%; height: 7.858em;">등록</button>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#submit').click(function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:'comment', //request 보낼 서버의 경로
            type:'post', // 메소드(get, post, put 등)
            data:{'comment': $("#comment").val(),
                  'id': "{{$id}}",
                  _token : token}, //보낼 데이터
            success: function(data) {
                if(data){
                    alert('댓글이 달렸습니다');

                   // $("#commentTable tbody").append("<tr>");
                    $("#commentTable tbody").append("<tr><td>" + data.userNick + "[" + data.affName + "]" + "<span style = 'float:right;'>"+ data.created_at +"</span><br><br>" + data.comment + "</td></tr>");
                    //$("#commentTable").append("</tr>");
                }
            },
            error: function(err) {
                //서버로부터 응답이 정상적으로 처리되지 못햇을 때 실행
                alert('error');
            }
        });
    })
</script>
@endsection