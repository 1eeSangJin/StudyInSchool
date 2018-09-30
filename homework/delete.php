<?php
    session_start();

    require_once('tools.php');
    require_once('boardDao.php');

    $num = requestValue('num');
    $dao = new boardDao();
    $userNick = $dao->checkUser($num);

    foreach($userNick as $check){
        if($_SESSION['userNick'] == $check['userNick']){
?>
            <script>
                var check = confirm("정말 삭제하시겠습니까?");
                if(!check){
                    location.href='board.php';
                }else{
                    <?php $dao->deleteBoard($num) ?>;
                    alert("삭제되었습니다.");
                    location.href='board.php';
                }
            </script>
<?php
        }else{
            echo "<script>alert('본인만 삭제할 수 있습니다.')</script>";
            echo "<script>location.replace('board.php');</script>";
        }
    }
?>