<?php
/***************************************************************
 * 작성자 : 1501204 이상진
 * 기능 : 유저들을 관리하는 db쿼리문들을 수행하는 함수들이 들어있음
 **************************************************************/
    class memberDao {
        private $db;
        public function __construct() {
            /****************************************
             * db연결
             ***************************************/
            try{
                $this->db = new PDO("mysql:host=localhost;dbname=php", "root", "ef5055");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // SQL에서도 오류가 뜨면 알려줘
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
        
        function insertUser($userId, $userPw, $userNick){
            /**********************************************************
             * userId, userPw, userNick을 받아 
             * users라는 테이블에 넣어 
             * 회원가입을 하는 함수 insertUser
             *********************************************************/
            try{
                $sql = "insert into users(userId, userPw, userNick) values(:userId, :userPw, :userNick)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);
                $pstmt->bindValue(":userPw", $userPw, PDO::PARAM_STR);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getUser($userId){
            /*****************************************************************
             * userId를 받아 users라는 테이블에서 
             * userId값들을 받아와 결과를 리턴하여
             * 회원가입을 할 때 중복되는 아이디의 유무를 검사하는 함수 getUser
             ****************************************************************/
            try{
                $sql = "select * from users where userId=:userId";
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