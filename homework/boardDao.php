<?php
/*********************************************************
 * 작성자 : 1501204 이상진
 * 기능 : 게시판에 관련된 쿼리문을 수행하는 함수들이 들어있음
 ********************************************************/
    class boardDao{
        private $db;
        function __construct(){
            /****************************************
             * db연결
             ***************************************/
            try{
                $this->db = new PDO("mysql:host=localhost;dbname=php", "root", "ef5055");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function insertBoard($userNick, $title, $content){
            /***********************************************************************
             * userNick, title, content라는 변수들을 받아
             * boards라는 게시판 db에 저장하여
             * 게시글을 등록하는 insertBoard 함수
             **********************************************************************/
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
            /***********************************************************************
             * num이라는 변수를 받아
             * 이용자가 본 게시글의 조회수를 1 올려주는
             * increaseHits 함수
             **********************************************************************/
            try{
                $pstmt = $this->db->prepare("update boards set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function checkUser($num){
            /***********************************************************************
             * num이라는 변수를 받아
             * 그 게시글을 쓴 유저의 닉네임을 받아온다.
             * 닉네임을 받은 것을 리턴하여 modify_form과 delete.php에서 
             * 현재 로그인 되어있는 유저의 닉네임과 글 작성자의 유저 닉네임을 비교하는
             * 기능을 할 수 있게 지원하는 checkUser 함수
             **********************************************************************/
            try{
                $sql = "select userNick from boards where num=:num";
                $pstmt=$this->db->prepare($sql);
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function deleteBoard($num) {
            /***********************************************************************
             * num이라는 변수를 받아
             * boards에 있는 게시글을 삭제할 수 있게 하는
             * deleteBoard 함수
             **********************************************************************/
            try{
                $pstmt = $this->db->prepare("delete from boards where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateBoard($title, $content, $num){
            /***********************************************************************
             * title, content, num이라는 변수를 받아
             * boards에 있는 게시글 중 받아온 num에 맞는 게시글의 정보를
             * 수정할 수 있게 하는 updateBoard 함수
             **********************************************************************/
            try{
                $pstmt = $this->db->prepare("update boards set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getBoard($num){
            /***********************************************************************
             * num이라는 함수를 받아
             * boards에 있는 게시글 중 num값에 맞는 게시글의 상세정보를 불러오는
             * getBoard 함수
             **********************************************************************/
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
            /***********************************************************************
             * boards에 있는 모든 게시글 정보들을 불러와
             * board.php에서 모든 게시글을 볼 수 있게 하는 기능을 제공하는
             * getAllboard 함수 
             **********************************************************************/
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