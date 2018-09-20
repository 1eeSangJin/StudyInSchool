<?php
    class MemberDao {
        private $db;
        public function __construct() {
            try{
                $this->db = new PDO("mysql:host=localhost;dbname=php", "root", "ef5055");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // SQL에서도 오류가 뜨면 알려줘
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }        

        function getMember($id) {
            try{
                // place holder
                $pstmt = $this->db->prepare("select * from member where id=:id"); // 문법 검사, 유효성 검사  -> prepare가 하는 일
                $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
                $pstmt->execute();
                $result = $pstmt->fetch(PDO::FETCH_ASSOC); // 배열을 만들어주고 첨자는 ASSOC로 해준다.

            }catch(PDOException $e) {
                exit($e->getMessage());
            }
            return $result;
        }
        function insertMember($id, $pw, $name){
            try{
                $sql = "insert into member(id, pw, name) values(:id, :pw, :name)";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
                $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
                $pstmt->bindValue(":name", $name, PDO::PARAM_STR);

                $pstmt->execute();

            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }

        function updateMember($id, $pw, $name){
            try{
                $sql = "update member set pw=:pw, name=:name where id=:id";
                $pstmt = $this->db->prepare($sql);

                $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
                $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
                $pstmt->bindValue(":name", $name, PDO::PARAM_STR);

                $pstmt->execute();
            }catch(PDOExceiton $e){
                exit($e->getMessage());
            }
        }
    }
?>