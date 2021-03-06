<?php
    /*************************************************************
     * 작성자 : 1501204 이상진
     * 기능 : 다른곳에서 다양한 기능을 수행하는 함수들이 들어있음.
     ************************************************************/

    define ("MAIN_PAGE", "board.php");
    /**************************************************
     * board.php를 MAIN_PAGE라는 이름으로 지정
     *************************************************/

    function requestValue($name){
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : "" ;
    }
    /************************************************************
     * requestValue함수를 호출하였을 때 넘어온 값이 존재할 시
     * 값을 호출한 쪽에 보내주고 없을 시 아무것도 넘겨주지 않는다
     ***********************************************************/

    
    function errorBack($msg) {
?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <script>
            alert('<?= $msg ?>');
            history.back();
        </script>
    </body>
    </html>
<?php
        exit(); 
    }

    /**************************************************
     * 에러메시지를 출력하기 위한 함수이다
     * 함수 호출 때 넘어온 값이 경고창으로 출력된다
     *************************************************/

    function okGo($msg, $url){
        ?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <script>
            alert('<?= $msg ?>');
            location.href="<?= $url ?>";
        </script>
    </body>
    </html> 
<?php
    exit();
    }

    /**************************************************
     * 알람창을 띄우고 지정된 url로 이동해주는 함수이다.
     *************************************************/
?>