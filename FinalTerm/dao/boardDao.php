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
                $this->db = new PDO("mysql:host=localhost;dbname=board", "root", "ef5055");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function insertNotices($userNick, $title, $content, $affName){
            try{
                $sql = "insert into notices(userNick, title, content, date, hits, recommend, affName) values(:userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
        
        function increseNoticesHits($num){
            try{
                $pstmt = $this->db->prepare("update notices set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteNotices($num) {
            try{
                $pstmt = $this->db->prepare("delete from notices where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateNotices($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update notices set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getNotices($num){
            try{
                $sql = "select * from notices where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllnotices($start, $rows){
            try{
                $sql = "select * from notices order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfNotices(){
            try{
                $sql = "select count(*) from notices";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function inputCommentNotices($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into notices_comment(board_num, userNick, affName,  comment, date) values(:board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentNotices($board_num){
            try{
                $sql = "delete from notices_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentNotices($board_num){
            try{
                $sql = "select * from notices_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentNotices($board_num){
            try{
                $sql = "select count(*) from notices_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CommentNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CommentNotices;
        }

    /*********************************************************************************************공지사항 게시판 용************************************************************* */

        function insertCominfo($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(101, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
        
        function increseCominfoHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCominfo($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateCominfo($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getCominfo($num){
            try{
                $sql = "select * from dept_board where dept_num=101 and num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllcominfo($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=101 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfComInfo(){
            try{
                $sql = "select count(*) from dept_board where dept_num=101";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkComInfoUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        } 

        function inputCommentComInfo($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName, comment, date) values(101, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentComInfo($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentComInfo($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentComInfo($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CommentComInfo = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CommentComInfo;
        }

    /*********************************************************************************************컴정 게시판 용************************************************************* */

        function insertCommachine($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(201, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);
    
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
    
                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseCommachineHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
    
        function deleteCommachine($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
    
        function updateCommachine($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);
    
                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }
    
        function getCommachine($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);
    
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }
    
        function getAllcommachine($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=201 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfComMachine(){
            try{
                $sql = "select count(*) from dept_board where dept_num=201";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkComMachineUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentComMachine($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(201, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentComMachine($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentComMachine($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentComMachine($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountComMachine = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountComMachine;
        }

    /*********************************************************************************************컴응기 게시판 용************************************************************* */

        function insertElectinfo($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(301, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);
    
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
    
                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseElectinfoHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
    
        function deleteElectinfo($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
    
        function updateElectinfo($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);
    
                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }
    
        function getElectinfo($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);
    
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }
    
        function getAllElectinfo($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=301 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfElectInfo(){
            try{
                $sql = "select count(*) from dept_board where dept_num=301";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkElectInfoUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentElectInfo($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(301, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentElectInfo($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentElectInfo($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentElectInfo($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountElectInfo = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountElectInfo;
        }

    /*********************************************************************************************전자정보 게시판 용************************************************************* */

        function insertEnergy($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(401, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseEnergyHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteEnergy($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateEnergy($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getEnergy($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllenergy($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=401 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfEnergy(){
            try{
                $sql = "select count(*) from dept_board";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkEnergyUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentEnergy($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(401, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentEnergy($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentEnergy($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentEnergy($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountEnergy = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountEnergy;
        }

    /*********************************************************************************************신재생 게시판 용************************************************************* */

        function insertBuild($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(501, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseBuildHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteBuild($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateBuild($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getBuild($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllbuild($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=501 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();

                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfBuild(){
            try{
                $sql = "select count(*) from dept_board where dept_num=501";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkBuildUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentBuild($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(501, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentBuild($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentBuild($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentBuild($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountBuild = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountBuild;
        }

    /*********************************************************************************************건축 게시판 용************************************************************* */

        function insertSmart($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(601, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseSmartHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteSmart($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateSmart($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getSmart($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllsmart($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=601 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfSmart(){
            try{
                $sql = "select count(*) from dept_board where dept_num=601";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkSmartUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentSmart($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(701, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentSmart($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentSmart($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentSmart($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountSmart = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountSmart;
        }

    /******************************************************************************************스맛경영 게시판 용*********************************************************** */

        function insertSeesighting($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(701, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseSeesightingHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteSeesighting($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateSeesighting($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getSeesighting($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllseesighting($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=701 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfSeesighting(){
            try{
                $sql = "select count(*) from dept_board where dept_num=701";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkSeesightingUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentSeesighting($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(701, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentSeesighting($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentSeesighting($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentSeesighting($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountSeesighting= $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountSeesighting;
        }

    /******************************************************************************************국제관광 게시판 용*********************************************************** */

        function insertSoldier($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(801, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseSoldierHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteSoldier($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateSoldier($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getSoldier($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllsoldier($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=801 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfSoldier(){
            try{
                $sql = "select count(*) from dept_board where dept_num=801";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkSoldierUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentSoldier($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(801, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentSoldier($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentSoldier($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentSoldier($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountSoldier = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountSoldier;
        }

    /******************************************************************************************부사관 게시판 용*********************************************************** */  

        function insertContents($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(901, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseContentsHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteContents($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateContents($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getContents($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllcontents($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=901 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfContents(){
            try{
                $sql = "select count(*) from dept_board where dept_num=901";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkContentsUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentContents($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(901, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentContents($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentContents($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentContents($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountContents = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountContents;
        }

    /******************************************************************************************컨텐디자인 게시판 용*********************************************************** */ 
    
        function insertWelfare($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(1001, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseWelfareHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteWelfare($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateWelfare($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getWelfare($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllwelfare($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=1001 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);
                
                $pstmt->execute();

                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfWelfare(){
            try{
                $sql = "select count(*) from dept_board where dept_num=1001";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkWelfareUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentWelfare($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_nuum, board_num, userNick, affName,  comment, date) values(1001, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentWelfare($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentWelfare($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentWelfare($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountWelfare = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountWelfare;
        }

    /******************************************************************************************사회복지 게시판 용*********************************************************** */

        function insertEducate($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(1101, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseEducateHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteEducate($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateEducate($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getEducate($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAlleducate($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=1101 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfEducate(){
            try{
                $sql = "select count(*) from dept_board where dept_num=1101";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkEducateUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentEducate($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(1101, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentEducate($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentEducate($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentEducate($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountEducate = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountEducate;
        }

    /******************************************************************************************유아교육 게시판 용*********************************************************** */
    
        function insertNurse($userNick, $title, $content, $affName){
            try{
                $sql = "insert into dept_board(dept_num, userNick, title, content, date, hits, recommend, affName) values(1201, :userNick, :title, :content, now(), 0, 0, :affName)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":title", $title, PDO::PARAM_STR);
                $pstmt->bindValue(":content", $content, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
            
        function increseNurseHits($num){
            try{
                $pstmt = $this->db->prepare("update dept_board set hits=hits+1 where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteNurse($num) {
            try{
                $pstmt = $this->db->prepare("delete from dept_board where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateNurse($title, $content, $num){
            try{
                $pstmt = $this->db->prepare("update dept_board set title=:title, content=:content where num=:num");
                $pstmt->bindValue(":title",$title, PDO::PARAM_STR);
                $pstmt->bindValue(":content",$content, PDO::PARAM_STR);
                $pstmt->bindValue(":num",$num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOExcetion $e){
                exit($e->getMessager());
            }
        }

        function getNurse($num){
            try{
                $sql = "select * from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);
                $pstmt->execute();
                $msgs = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getAllnurse($start, $rows){
            try{
                $sql = "select * from dept_board where dept_num=1201 order by num desc limit :start, :rows";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":start", $start, PDO::PARAM_INT);
                $pstmt->bindValue(":rows", $rows, PDO::PARAM_INT);

                $pstmt->execute();
                
                $msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msgs;
        }

        function getNumOfNurse(){
            try{
                $sql = "select count(*) from dept_board where dept_num=1201";
                $pstmt = $this->db->prepare($sql);

                $pstmt->execute();

                $NumOfNotices = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $NumOfNotices;
        }

        function checkNurseUser($num){
            try{
                $sql = "select userNick from dept_board where num=:num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":num", $num, PDO::PARAM_INT);

                $pstmt->execute();

                $user = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $user;
        }

        function inputCommentNurse($board_num, $userNick, $affName, $comment){
            try{
                $sql = "insert into dept_board_comment(dept_num, board_num, userNick, affName,  comment, date) values(1201, :board_num, :userNick, :affName, :comment, now())";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);
                $pstmt->bindValue(":userNick", $userNick, PDO::PARAM_STR);
                $pstmt->bindValue(":affName", $affName, PDO::PARAM_STR);
                $pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function deleteCommentNurse($board_num){
            try{
                $sql = "delete from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function getAllCommentNurse($board_num){
            try{
                $sql = "select * from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $comments = $pstmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $comments;
        }

        function countCommentNurse($board_num){
            try{
                $sql = "select count(*) from dept_board_comment where board_num=:board_num";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":board_num", $board_num, PDO::PARAM_INT);

                $pstmt->execute();

                $CountNurse = $pstmt->fetchColumn();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $CountNurse;
        }
    /******************************************************************************************간호학과 게시판 용*********************************************************** */
    }
?>