<?php
class sp
{
    var $id_sp = null;
    var $ten_sp = null;
    var $img = null;
    var $giagoc = null;
    var $khuyenmai = null;
    var $mota = null;
    var $id_loai = null;
    
    public function __construct()
    {
        if(func_num_args() == 7){
            $this->ma_sp = func_num_args(0);
            $this->ten_sp = func_num_args(1);
            $this->img_sp = func_num_args(2);
            $this->giagoc_sp = func_num_args(3);
            $this->giamgia_sp = func_num_args(4);
            $this->mota_sp = func_num_args(5);
            $this->ma_loai = func_num_args(6);
        }
    }

    public function getlistSP()
    {
        $db = new connect();
        $str = "SELECT a.*, b.ten_loai FROM sanpham a JOIN loaisanpham b ON a.id_loai = b.id_loai";
        $r = $db->getList($str);
        return $r;
    }

    public function getinstanceSP($id_sp)
    {
        $db = new connect();
        $str = "SELECT a.*, b.ten_loai, b.id_loai FROM sanpham a JOIN loaisanpham b ON a.id_loai = b.id_loai WHERE a.id_sp = $id_sp";
        $r = $db->getinstance($str);
        return $r;
    }

    public function addSP($ten_sp, $img, $giagoc, $khuyenmai, $id_loai, $mota, $anhien)
    {
        $db = new connect();
        $str = "INSERT INTO `sanpham` (`id_sp`,`ten_sp`,`image`,`gia_goc`,`giam_gia`,`id_loai`,`mota`, `AnHien`)
        VALUES (null, '".$ten_sp."', '".$img."', '".$giagoc."','".$khuyenmai."','".$id_loai."','".$mota."','".$anhien."');";
        $r = $db->exec($str);
        return $r;
    }

    public function updateSP($id_sp, $ten_sp, $img, $giagoc, $khuyenmai, $id_loai, $mota, $anhien)
    {
        $db = new connect();
        $str = "UPDATE sanpham
        SET ten_sp = '".$ten_sp."', `image` = '".$img."', `gia_goc` = '".$giagoc."', `giam_gia` = '".$khuyenmai."', `id_loai` = '".$id_loai."', `mota` = '".$mota."', AnHien = $anhien
        WHERE `sanpham`.`id_sp` =  $id_sp;";
        $r = $db->exec($str);
        return $r;
    }

    public function deleteSP($id_sp)
    {
        $db = new connect();
        $str = "DELETE FROM `sanpham` WHERE `sanpham`.`id_sp` = $id_sp";
        $r = $db->exec($str);
        return $r;
    }

    public function listCatePro(){
        $db = new connect();
        $str = "SELECT * FROM loaisanpham";
        $r = $db->getList($str);
        return $r;
    }

    public function getSlideShow(){
        $db = new connect();
        $str = "SELECT * FROM sanpham a
        JOIN loaisanpham b ON b.id_loai = a.id_loai
        JOIN loailaptop c ON c.id_loailaptop = b.id_loailaptop
        WHERE a.AnHien = 1 AND a.Slideshow = 1 ORDER BY ngayNhap DESC";
        $r = $db->getList($str);
        return $r;
    }

    public function addslide($id){
        $db = new connect();
        $str = "UPDATE sanpham SET Slideshow = 1 WHERE id_sp = $id ORDER BY ngayNhap DESC";
        $r = $db->exec($str);
        return $r;
    }

    public function deleteSlide($id){
        $db = new connect();
        $str = "UPDATE sanpham SET Slideshow = 0 WHERE id_sp = $id";
        $r = $db->exec($str);
        return $r;
    }

    public function getlistForSlide()
    {
        $db = new connect();
        $str = "SELECT a.*, b.ten_loai FROM sanpham a JOIN loaisanpham b ON a.id_loai = b.id_loai WHERE Slideshow = 0 ORDER BY ngayNhap DESC";
        $r = $db->getList($str);
        return $r;
    }

    public function formatMoney($number, $fractional=false) {  
	    if ($fractional) {  
	        $number = sprintf('%.2f', $number);  
	    }  
	    while (true) {  
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);  
	        if ($replaced != $number) {  
	            $number = $replaced;  
	        } else {  
	            break;  
	        }  
	    }  
	    return $number;  
	}
}
?>