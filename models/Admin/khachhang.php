<?php
class khachhang
{
    var $id_kh = null;
    var $ten_kh = null;
    var $matkhau = null;
    var $email = null;
    var $dia_chi = null;
    var $phone = null;
    var $username = null;
    var $phanquyen = null;
    
    public function __construct()
    {
        if(func_num_args() == 8){
            $this->id_kh = func_num_args(0);
            $this->ten_kh = func_num_args(1);
            $this->matkhau = func_num_args(2);
            $this->email = func_num_args(3);
            $this->dia_chi = func_num_args(4);
            $this->phone = func_num_args(5);
            $this->username = func_num_args(6);
            $this->phanquyen = func_num_args(6);
        }
    }

    public function getlistKH()
    {
        $db = new connect();
        $str = "SELECT * FROM khachhang";
        $r = $db->getList($str);
        return $r;
    }

    public function getinstanceKH($id_kh)
    {
        $db = new connect();
        $str = "SELECT * FROM khachhang WHERE id_kh = $id_kh";
        $r = $db->getinstance($str);
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

    public function updateKH($id_kh, $phanquyen)
    {
        $db = new connect();
        $str = "UPDATE khachhang
        SET phanquyen = $phanquyen
        WHERE id_kh =  $id_kh";
        $r = $db->exec($str);
        return $r;
    }

    public function deleteKH($id_kh)
    {
        $db = new connect();
        $str = "DELETE FROM khachhang WHERE id_kh = $id_kh";
        $r = $db->exec($str);
        return $r;
    }

    public function login($username, $pass){
        $db = new connect();
        $str = "SELECT * FROM khachhang WHERE email = '$username' AND matkhau = '$pass'";
        $r = $db->getinstance($str);
        return $r;
    }

    public function changepassword($id_kh, $passmoi){
        $db = new connect();
        $str = "UPDATE khachhang SET matkhau = $passmoi WHERE id_kh = $id_kh";
        $r = $db->exec($str);
        return $r;
    }

    public function changephanquyen($id_kh, $phanquyen_moi){
        $db = new connect();
        $str = "UPDATE khachhang SET phanquyen = $phanquyen_moi WHERE id_kh = $id_kh";
        $r = $db->exec($str);
        return $r;
    }
}
?>