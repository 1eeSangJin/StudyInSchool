@extends('app')

@section('content')
  <div class = "column" id = "content">
      <div class = "ui hidden section divider"></div>
      <div>
        <h3>
          <span><?= $msgs['title'] ?> | 스마트경영계열</span>
        </h3>
      </div>
      <div>
        <em><?= $msgs['userNick'] ?></em> 
        <span>|</span>
        <span><?= $msgs['date'] ?></span>
        <span style = "float:right;"><?= $msgs['recommend'] ?></span>
        <span style = "float:right; margin-right:1.5em">추천</span>
        <span style = "float:right; margin-right:1.5em"><?= $msgs['hits'] ?></span>
        <span style = "float:right; margin-right:1.5em">조회수</span>
        <span style = "float:right; margin-right:1.5em"><?= $msgs['num'] ?></span>
        <span style = "float:right; margin-right:1.5em">게시글 번호</span>
      </div>
      <div class = "ui divider"></div>
    
      <div id = "contents">
        <span style = "float:right;">
          <a href = "deleteCominfo?num=<?= $msgs['num'] ?>&page=<?= $page ?>" onclick = "return confirm('정말 삭제하시겠습니까?')" class = "ui secondary button">삭제</a>
          <button class = 'ui secondary button' onclick = "location.href='modifyCominfo_form?num=<?=$msgs['num'] ?>&page=<?= $page ?>'">수정</button>
          <button class = 'ui secondary button' onclick = "location.href='cominfoBoard?page=<?= $page?>'">목록</button>
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
    
        <div class = "jumbotron">
          <table class = "ui celled table">
            <?php error_reporting(0); ?>
            @foreach($comments as $comment) 
              <tr>
                <td>
                  {{ $comment['userNick'] }} [{{ $comment['affName'] }}]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$comment['date'] }}
                  <br>
                  <?= $comment['comment'] ?>
                </td>
              </tr>
            @endforeach>
          </table>
          <form action="comment?num=<?= $msgs['num'] ?>&page=<?= $page ?>" method="post">
            <textarea name="comment" id="comment" cols="130" rows="5"></textarea>
            <button type="submit" style="width: 15%; height: 7.858em;">등록</button>
          </form>
        </div>
      </div>
  </div>
@endsection