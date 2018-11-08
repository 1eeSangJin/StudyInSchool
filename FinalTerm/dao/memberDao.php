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
                $this->db = new PDO("mysql:host=localhost;dbname=board", "root", "ef5055");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // SQL에서도 오류가 뜨면 알려줘
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
        
        function insertUser($userId, $userPw, $userNick, $userName, $sex, $userPhone, $affNum){
            /**********************************************************
             * userId, userPw, userNick을 받아 
             * users라는 테이블에 넣어 
             * 회원가입을 하는 함수 insertUser
             *********************************************************/
            try{
                $sql = "insert into usersss(userId, userPw, userNick, userName, sex, userPhone, affNum) values(:userId, :userPw, :userNick, :userName, :sex, :userPhone, :affNum)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);
                $pstmt->bindValue(":userPw", $userPw, PDO::PARAM_STR);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":userName", $userName, PDO::PARAM_STR);
                $pstmt->bindValue(":sex", $sex, PDO::PARAM_STR);
                $pstmt->bindValue(":userPhone", $userPhone, PDO::PARAM_STR);
                $pstmt->bindValue(":affNum", $affNum, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateUser($userPw, $userNick, $userPhone, $affNum, $userId){
            try{
                $sql1 = "set foreign_key_checks = 0";
                $sql2 = "update usersss set userPw=:userPw, userNick=:userNick, userPhone=:userPhone, affNum=:affNum where userId=:userId";
                $sql3 = "set foreign_key_checks = 1";

                $this->db->query($sql1);
                $pstmt = $this->db->prepare($sql2);


                $pstmt->bindValue(":userPw", $userPw, PDO::PARAM_STR);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":userPhone", $userPhone, PDO::PARAM_STR);
                $pstmt->bindValue(":affNum", $affNum, PDO::PARAM_STR);
                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);

                $pstmt->execute();
                $this->db->query($sql3);

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteUser($userId){
            try{
                $sql1 = "set foreign_key_checks = 0";
                $sql2 = "delete from usersss where userId=:userId";
                $sql3 = "set foreign_key_checks = 1";

                $this->db->query($sql1);
                $pstmt = $this->db->prepare($sql2);

                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);

                $pstmt->execute();
                $this->db->query($sql3);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getUser($userId){
            /*****************************************************************
             * userId를 받아 users라는 테이블에서 
             * userId값들을 받아와 결과를 리턴하여
             * 회원가입, 로그인, 회원정보 수정을 할 때 아이디의 유무를 검사하는 함수 getUser
             ****************************************************************/
            try{
                $sql = "select * from usersss where userId=:userId";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);

                $pstmt->execute();

                $result = $pstmt->fetch(PDO::FETCH_ASSOC); // 배열을 만들어주고 첨자는 ASSOC로 해준다.
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $result;
        }

        function getNick($userNick){
            /*****************************************************************
             * userNick를 받아 users라는 테이블에서 
             * userNick값들을 받아와 결과를 리턴하여
             * 회원가입을 할 때 중복되는 닉네임의 유무를 검사하는 함수 getNick
             ****************************************************************/
            try{
                $sql = "select * from usersss where userNick=:userNick";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);

                $pstmt->execute();

                $result = $pstmt->fetch(PDO::FETCH_ASSOC); // 배열을 만들어주고 첨자는 ASSOC로 해준다.
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $result;
        }

        function getAff($userId){
            try{
                $sql = "select u.userId, a.affName from usersss u, affiliation a where u.affNum = a.affNum and u.userId=:userId";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userId", $userId, PDO::PARAM_STR);

                $pstmt->execute();

                $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $result;
        }
    }
?>