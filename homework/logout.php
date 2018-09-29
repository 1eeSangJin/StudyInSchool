<?php
    session_start();
    session_destroy(); //세션제거함수

    header("Location: board.php");
?>