@extends('app')


@section('content')
    <div class = "column" id = "content">
        <div class = "ui hidden section divider"></div>
        <div class = "row">
            <h1 class = "ui huge header">
                [컴정] 게시글 작성
            </h1>
        </div>
  
        <br>
  
        <form action = "writeCominfo" method = "post" class = "ui form">
            @csrf
            <h2 class = "ui dividing header">작성내용</h2>
            <?php error_reporting(0); ?>
            <div class = "two field">
                <label>작성자</label>
                <div class = "four wide field">
                    <input type = "text" name = "userNick" id = "userNick" value = "{{$userInfo['userNick']}}" readonly required>
                </div>
                <label>소속</label>
                <div class = "four wide field">
                    <?php foreach($getAff as $affName) :?>
                    <input type="text" name = "affName" id = "affName" value = "{{$affName['affName']}}" readonly>
                    <?php endforeach ?>
                </div>
            </div>
  
            <div class = "field">
                <label>제목</label>
                <div class = "twelve wide field">
                    <input type = "text" name = "title" id = "title" required>
                </div>
            </div>
  
  
  
            <div class="field">
                <label>내용</label>
                <textarea name = "contents" id = "contents" rows="15" cols="10"></textarea>
            </div>
              
            <button type = "submit" class = "ui secondary button" id = "submit_button">등록하기</button>
            <button type = "button" class = "ui secondary button" onclick = "location.href='cominfoBoard'">돌아가기</button>
        </form>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    CKEDITOR.replace('contents',{
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'arta'
    });

    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>

@endsection