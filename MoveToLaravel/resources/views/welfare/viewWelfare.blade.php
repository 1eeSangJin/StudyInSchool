@extends('app')

@section('content')
<div class = "column" id = "content">
    <div class = "ui hidden section divider"></div>
    <div>
        <h3>
        <span><?= $msgs['title'] ?> | 사회복지</span>
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
            <a href = "deleteWelfare?id={{ $msgs['id'] }}&page={{ $page }}" onclick = "return confirm('정말 삭제하시겠습니까?')" class = "ui secondary button">삭제</a>
            <button class = 'ui secondary button' onclick = "location.href='modifySoldier_form?id={{ $msgs['id'] }}&page={{ $page }}'">수정</button>
            <button class = 'ui secondary button' onclick = "location.href='soldierBoard?page={{ $page }}'">목록</button>
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
                <span id = "cntSpan">{{$count}}</span> |&nbsp
            </td>
            
            <td>
                <span>조회수 </span>
                <span>{{ $msgs['hits'] }}</span> |&nbsp
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
                    <td id = "td{{ $i }}">
                        <span id = "nickData{{$i}}">{{ $comment['userNick'] }}</span> [{{ $comment['affName'] }}] <span style = "float:right;" id = "comData{{$i}}">{{$comment['created_at'] }}</span>
                    <br>
                    @if(Auth::check() && Auth::user()->userNick == $comment['userNick'])
                    <div style = "float:right;" id="{{$i}}">
                            <button class = "update btn" type = "submit">수정</button> &nbsp;|&nbsp;
                            <button class = "delete btn" type = "submit">삭제</button>
                    </div>
                    @endif
                    <br>
                    <span id = "comment{{$i}}">{{ $comment['comment'] }}</span>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </table>
            <div class = 'desarea'>
                <textarea name="comment" id="comment" cols="140" rows="5"></textarea>
                <button class = "btn" id="submit" type="submit" style="width: 13%; height: 7.858em;">등록</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var token = $('meta[name="csrf-token"]').attr('content');
    var i = {{$i}};

    $('#submit').click(function(){
        $.ajax({
            url:'save', //request 보낼 서버의 경로
            type:'post', // 메소드(get, post, put 등)
            data:{  'comment': $("#comment").val(),
                    'id': "{{$id}}",
                    _token : token}, //보낼 데이터
            success: function(data) {
                if(data){
                    alert('댓글이 달렸습니다');

                    $("#commentTable tbody").append("<tr><td id=td" + i + ">" + data.userNick + "[" + data.affName + "]" +
                                                    "<span style = 'float:right;'>"+ data.created_at +
                                                    "</span><br>" + "<div style = 'float:right;' id=" + i + ">" + "</div>" + "<br>" + data.comment + "</td></tr>");
                    $("#" + i).append("<button class = 'update btn' type = 'submit'>수정</button>"
                                                        + "&nbsp | &nbsp" + "<button class = 'delete btn' type = 'submit'>삭제</button>");
                    $("#comment").val(" ");

                    i++;
                }
            },
            error: function(err) {
                //서버로부터 응답이 정상적으로 처리되지 못햇을 때 실행
                alert('error');
            }
        });
    })

    $('.delete').click(function(){
        var num = $(this).parent().attr('id');
        $.ajax({
            url:'delComment',
            type:'post',
            data:{  'id': "{{$id}}",
                    'tdId' : num,
                    'writer' : $("#nickData"+num).html(),
                    'date': $("#comData"+num).html(),
                    _token : token},
            success: function(data){
                if(data){
                    alert("삭제되었습니다");

                    $("#td" + data.tdId).remove();
                }
            },
            error: function(err){
                alert("error");
            }
        });
    })

    $('.update').click(function(){
        var num = $(this).parent().attr('id');
        var comment = $("#comment"+num).html();
        $("#"+num).remove();
         
        $("#comment"+num).append("<br><textarea name=comment id=comment" + num + " cols='140' rows='5'>"+ comment +"</textarea>");
        $("#comment"+num).append("<div style = 'float:right;'><button class = 'updat btn' type = 'submit'>수정</button>" + "&nbsp;|&nbsp" + "<button class = 'cancel btn' type = 'submit'>수정 취소</button>");
    })

    $('#cancel').click(function(){
       $('#comment'+num).remove(); 
       $('#comment'+num).remove();
    })
</script>
@endsection