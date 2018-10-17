<?php
    class boardDao{
        private $db;
        function __construct(){
            try{
                $this->db = new PDO("mysql:host=localhost;dbname=php", "root", "ef5055");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function insertMsg($writer, $title, $content){
            try{
                $sql = "insert into board(writer, title, content, regtime, hits) values(:writer, :title, :content, now(), 0)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getMsg($num) {
            try{
                // place holder
                $pstmt = $this->db->prepare("select * from board where Num=:Num"); // 문법 검사, 유효성 검사  -> prepare가 하는 일
                $pstmt->bindValue(":Num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $result = $pstmt->fetch(PDO::FETCH_ASSOC); // 배열을 만들어주고 첨자는 ASSOC로 해준다.

            }catch(PDOException $e) {
                exit($e->getMessage());
            }
            return $result;
        }
        
        function increseHits($num){
            try{
                $pstmt = $this->db->prepare("update board set Hits=Hits+1 where Num=:Num");
                $pstmt->bindValue(":Num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteMsg($num) {
            try{
                $pstmt = $this->db->prepare("delete from board where Num=:Num");
                $pstmt->bindValue(":Num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateMsg($writer, $title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update board set Writer=:Writer, Title=:Title, Content=:Content where Num=:Num");
                $pstmt->bindValue(":Writer",$writer, PDO::PARAM_STR);
                $pstmt->bindValue(":Title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":Content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":Num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }


        function getManyMsgs(){ //populate.php, rows.txt 활용
            try{
                $sql = "select * from board";
                $pstmt = $this->db->prepare($sql);
                $pstmt->execute(); //결과집합이 생성된다
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getTotalCount(){ //populate.php, rows.txt 활용
            try{
                $sql = "select count(*) from board";
                $pstmt = $this->db->prepare($sql);
                $pstmt->execute(); //결과집합이 생성된다
                $count = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $count;
        }

        function getMsgs4Page($startRecord, $count){
            try{
                $sql = "select * from board order by num desc  limit :s, :c";
                $pstmt = $this->db->prepare($sql);
                $pstmt->bindValue(":s", $startRecord, PDO::PARAM_INT);
                $pstmt->bindValue(":c", $count, PDO::PARAM_INT);
                $pstmt->execute(); //결과집합이 생성된다
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }
        
    }

    

?>