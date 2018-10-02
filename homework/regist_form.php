<!DOCTYPE html>
<!--
    작성자 : 1501204 이상진
    기능 : 회원가입 페이지
    설명 : 이용자에게 id, password, nickname을 입력받ㄷ아 regist.php로 보내는 기능을 수행한다
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="jumbotron">
    <form action="regist.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input type="text" class="form-control" name="userId" id="userId" placeholder="Enter ID">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="userPw" id="userPw" placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">NickName</label>
            <input type="text" class="form-control" name="userNick" id="userNick" placeholder="Enter NickName">
        </div>
        <button type="submit" class="btn btn-danger">회원가입</button>
        <button type="button" class="btn btn-primary" onclick="location.href='board.php'">돌아가기</button>
    </form>
</div>
</body>
</html>