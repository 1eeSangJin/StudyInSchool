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

        function insertBoard($userNick, $title, $content){
            try{
                $sql = "insert into boards(userNick, title, content, date, hits) values(:userNick, :title, :content, now(), 0)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
        
        function increseHits($num){
            try{
                $pstmt = $this->db->prepare("update boards set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function checkUser($num){
            try{
                $sql = "select userNick from boards where num=:num";
                $pstmt=$this->db->prepare($sql);
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $users = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $users;
        }

        function deleteBoard($num) {
            try{
                $pstmt = $this->db->prepare("delete from boards where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateBoard($writer, $title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update boards set writer=:writer, title=:title, content=:content where num=:num");
                $pstmt->bindValue(":wwriter",$writer, PDO::PARAM_STR);
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getBoard($num){ 
            try{
                $sql = "select * from boards where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllboard(){
            try{
                $sql = "select * from boards";
                $pstmt = $this->db->prepare($sql);
                $pstmt->execute();
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }
    }

?>