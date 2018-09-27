<?php
    class memberDao {
        private $db;
        public function __construct() {
            try{
                $this->db = new PDO("mysql:host=localhost;dbname=php", "root", "ef5055");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // SQL에서도 오류가 뜨면 알려줘
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
        
        function insertUser($userId, $userPw, $userNick){
            try{
                $sql = "insert into userinfo(userId, userPw, userNick) values(:userId, :userPw, :userNick)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);
                $pstmt->bindValue(":userPw", $userPw, PDO::PARAM_STR);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function login($userId){
            try{
                $sql = "select * from userinfo where userId=:userId";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);

                $pstmt->execute();

                $result = $pstmt->fetch(PDO::FETCH_ASSOC); // 배열을 만들어주고 첨자는 ASSOC로 해준다.
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $result;
        }
    }
?>