@extends('app')

@section('content')
    <div class = "column" id = "content">
        <div class = "ui hidden section divider"></div>
        <div class = "row">
            <h1 class = "ui huge header">
                [부사관] 게시글 수정
            </h1>
        </div>
    <br>

    <form action = "modifySoldier?id={{ $id }}&page={{ $page }}" method = "post" class = "ui form">
        @csrf
        <h2 class = "ui dividing header">내용</h2>

        <div class = "field">
            <label>작성자</label>
            <div class = "four wide field">
                <input type = "text" name = "userNick" id = "userNick" value = "{{ $msgs['userNick'] }}" readonly required>
            </div>
        </div>

        <div class = "field">
            <label>제목</label>
            <div class = "twelve wide field">
                <input type = "text" name = "title" id = "title" value = "<?= $msgs['title'] ?>" required>
            </div>
        </div>

        <div class="field">
            <label>내용</label>
            <input type = "text" name = "contents" id = "contents" rows="15" cols="10" value = "<?= $msgs['content'] ?>">
        </div>
        
        <button type = "submit" class = "ui secondary button" id = "submit_button">수정하기</button>
        <button type = "button" class = "ui secondary button" onclick = "location.href='soldierBoard.php'">돌아가기</button>
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