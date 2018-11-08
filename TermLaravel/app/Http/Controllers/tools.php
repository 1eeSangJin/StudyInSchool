<?php
    define ("MAIN_PAGE", "../main.php");
    define ("NUM_LINES", 5);
    define ("NUM_PAGE_LINKS", 2);

    function bdUrl($file, $num, $page){
        $join = "?";
        
        if($num){
            $file .= $join . "num=$num";
            $join = "&";
        }
        
        if($page)
            $file .= $join . "page=$page";

        return $file;
    }
    
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