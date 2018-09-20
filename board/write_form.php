<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h2>새 글쓰기 폼</h2>
    <p>아래의 모든 필드를 채워주세요</p>
    <form action="write.php" method="POST">
        <div class="form-group">
            <label for="title">제목:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="writer"> 작성자:</label>
            <input type="text" class="form-control" id="writer" name="writer" required>
        </div>
        <div class="form-group">
            <label for="content">내용:</label>
            <textarea class = "form-control" name="content" id="content" cols="30" rows="10" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">글 등록</button>
        <button type="submit" class="btn btn-danger" onckick="location.href='board.php'">목록으로</button>
    </form>
</body>
</html>