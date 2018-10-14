<?php
    define ("MAIN_PAGE", "../main.php");
    
    function requestValue($name){
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : "" ;
    }

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
?>