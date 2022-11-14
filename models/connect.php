<?php
    class connect {
        //khai báo thuộc tính 
        var $db = null;
        //phương thức khởi tạo 
        function __construct () {
            $dsn = "mysql:host=localhost;dbname=banlaptop";
            $user = 'root';
            $pass = 'dang12345';
            $this->db = new PDO($dsn , $user, $pass, 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) or die("Lỗi kết nối");
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        //gửi câu truy vấn lấy nguyên bảng dl 
        function getList ($select){
            $result = $this -> db -> query($select);
            $result = $result->fetchAll();
            return $result;
        }
        //lấy 1 dòng dl 
        function getInstance ($select){
            $results = $this -> db -> query($select);
            $result = $results ->fetch();
            return $result;
        }
        //thực thi câu lệnh insert, update, delete
        function exec($query){
            $result = $this ->db->exec($query);
            $last_id = $this ->db->lastInsertId();
            return $last_id;
        }

    }

    
?>
