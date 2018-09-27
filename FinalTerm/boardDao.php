<?php
    class boardDao{
        private $db;
        function __construct(){
            try{
                $this->db = new PDO("mysql:host=localhost;dbname=board", "root", "ef5055");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function joinUser($userId, $userPw, $userNN){
            try{
                $sql = "insert into userinfo(userId, userPw, userNN) values(:userId, :userPw,:userNN)";
                $pstmt = $this->$db->prepare($sql);

                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);
                $pstmt->bindValue(":userPw", $userPw, PDO::PARAM_STR);
                $pstmt->bindValue(":userNN", $userNN, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessage());
            }
        }

        function updateUser($userId, $userPw, $userNN){
            try{
                $sql = "update userinfo set userPw:userPw, userNN:userNN where userId:userId";
                $pstmt = $this->$db->prepare($sql);

                $pstmt->bindValue(":userPw", $userPw, PDO::PARAM_STR);
                $pstmt->bindValue(":userNN", $userNN, PDO::PARAM_STR);
                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOExceition $e){
                exit($e->getMessage());
            }
        }

        function deleteUser($userId){
            try{
                $sql = "delete from userinfo where userId:userId";
                
                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function viewBoard(){
            try{

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
?>