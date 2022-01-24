<?php
class loaisp
{
    var $id_loaisp = null;
    var $ten_loaisp = null;
    var $anhien = null;
    var $idlaptop = null;
    
    public function __construct()
    {
        if(func_num_args() == 4){
            $this->maloai = func_num_args(0);
            $this->tenloai = func_num_args(1);
            $this->anhien = func_num_args(2);
            $this->idlaptop = func_num_args(3);
        }
    }

    public function getlist()
    {
        $db = new connect();
        $str = "SELECT * FROM loaisanpham a
        JOIN loailaptop b ON a.id_loailaptop = b.id_loailaptop";
        $r = $db->getList($str);
        return $r;
    }

    public function get1cate($maloai)
    {
        $db = new connect();
        $str = "SELECT * FROM `loaisanpham` WHERE `loaisanpham`.`id_loai` = $maloai";
        $r = $db->getInstance($str);
        return $r;
    }

    public function addLoai($tenloai, $anhien, $idlaptop)
    {
        $db = new connect();
        $str = "INSERT INTO `loaisanpham` (`id_loai`,`ten_loai`,`AnHien`,id_loailaptop)
        VALUES (null, '".$tenloai."', '".$anhien."', $idlaptop);";
        $r = $db->exec($str);
        return $r;
    }

    public function updateLoai($maloai, $tenloai, $anhien, $idlaptop)
    {
        $db = new connect();
        $str = "UPDATE loaisanpham SET ten_loai = '$tenloai', AnHien = $anhien, id_loailaptop = $idlaptop
        WHERE id_loai =  $maloai";
        $r = $db->exec($str);
        return $r;
    }

    public function deleteLoai($maloai)
    {
        $db = new connect();
        $str = "DELETE FROM `loaisanpham` WHERE `loaisanpham`.`id_loai` = $maloai";
        $r = $db->exec($str);
        return $r;
    }

    public function getlistlaptop()
    {
        $db = new connect();
        $str = "SELECT * FROM loailaptop";
        $r = $db->getList($str);
        return $r;
    }
}
?>