<?php
    require_once("BoardDao.php");
    $dao = new BoardDao();

    $file = fopen("rows.txt", "r");

    /**
     * 한 줄씩 읽어서 ","를 기준으로 추출한 데이터를 1차원 배열로 만들어 준ㄷ다. fgetcsv();
     */
    while(!feof($file)){
        $data = fgetcsv($file); // ["김명종", "김명종김명종", "김명종김명종김명종"] 이런 식으로 1차원배열로 만들어진다
        // for($i = 0; $i < count($data); $i++){
        //     echo $data[$i], " ";
        // }
        // echo"<br>";
        $dao->insertMsg($data[0], $data[1], $data[2]);
    }
    fclose($file);

    header("Location: board.php"); //실행이 다 되면 board.php로 넘어간다
?>