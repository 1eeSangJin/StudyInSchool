<!DOCTYPE html>
<html lang="en">
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
    <?php
        require_once("MemberDao.php"); //MemberDao에 있기 때문에 import시켜준다
        require_once("tools.php");      //errorBack을 쓰기위해 import 시킴
        session_start();

        //DB에서 해당 사용자의 정보를 읽어온다. 그 놈을 변수 $member에 저장한다.
        $id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";

        if(!$id) { //로그인이 안되있을 때
            errorBack("로그인부터 해라"); //에러를 띄워주고 뒤로 보냄으로서 exit()를 따로 해줄 필요가 없다.
        }

        $mdao = new MemberDao();
        $member = $mdao->getMember($id);
    ?>
    <div class="container">
        <h2>회원정보 수정 폼</h2>
        <p>회원정보 수정을 위해 아래의 정보를 작성해주세요.</p>
        <form action="update.php" method="POST">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input type="text" class="form-control" id="usr" name="name" value= "<?php echo $member["name"] ?>">
            </div>
            <div class="form-group">
                <label for="usr">ID:</label>
                <input type="text" class="form-control" id="id" name="id" value= "<?php echo $member["id"] ?>" readonly> <!-- readonly를 해줌으로서 편집 못하게 함 -->
            </div>
            <div class="form-group">
                <label for="usr">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pw" value= "<?php echo $member["pw"] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>