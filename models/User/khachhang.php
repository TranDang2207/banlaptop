<?php 
    class khachhangUser
    {
        public function updateKH($id_kh, $ten_kh, $matkhau, $email, $dia_chi, $phone, $username, $phanquyen)
        {
            $db = new connect();
            $str = "UPDATE khachhang
            SET ten_kh = '".$ten_kh."', matkhau = '".$matkhau."', email = '".$email."', dia_chi = '".$dia_chi."', phone = '".$phone."', username = '".$username."', phanquyen = '".$phanquyen."'
            WHERE id_kh =  $id_kh";
            $r = $db->exec($str);
            return $r;
        }

        public function getlistKH()
        {
            $db = new connect();
            $str = "SELECT * FROM khachhang";
            $r = $db->getList($str);
            return $r;
        }    

        public function addKH($ten_kh, $matkhau, $email, $dia_chi, $phone, $username, $phanquyen)
        {
            $db = new connect();
            $str = "INSERT INTO khachhang (`id_kh`,`ten_kh`,`matkhau`,`email`,`dia_chi`,`phone`,`username`, `phanquyen`)
            VALUES (null, '".$ten_kh."', '".$matkhau."', '".$email."','".$dia_chi."','".$phone."','".$username."','".$phanquyen."');";
            $r = $db->exec($str);
            return $r;
        }

        public function updateKHCheckout($id_kh, $dia_chi)
        {
            $db = new connect();
            $str = "UPDATE khachhang
            SET dia_chi = '$dia_chi'
            WHERE id_kh =  $id_kh";
            $r = $db->exec($str);
            return $r;
        }

        public function login($username, $pass){
            $db = new connect();
            $str = "SELECT * FROM khachhang WHERE email = '$username' AND matkhau = '$pass'";
            $r = $db->getinstance($str);
            return $r;
        }
    }
?>