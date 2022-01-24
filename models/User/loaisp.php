<?php
class loaispUser
{
    var $id_loaisp = null;
    var $ten_loaisp = null;
    var $anhien = null;
    
    public function __construct()
    {
        if(func_num_args() == 3){
            $this->maloai = func_num_args(0);
            $this->tenloai = func_num_args(1);
            $this->anhien = func_num_args(2);
        }
    }

    public function getlist()
    {
        $db = new connect();
        $str = "SELECT * FROM `loaisanpham` WHERE AnHien = 1";
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
}
?>