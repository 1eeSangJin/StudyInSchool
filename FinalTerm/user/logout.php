<?php
    require_once('../tools.php');
    session_start();
    session_destroy();

    okGo('로그아웃 완료', '../main.php')
?>