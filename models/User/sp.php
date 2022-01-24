<?php
class spUser
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
        $str = "SELECT * FROM sanpham WHERE AnHien = 1 ORDER BY ngayNhap DESC";
        $r = $db->getList($str);
        return $r;
    }

    public function getlistSPlast()
    {
        $db = new connect();
        $str = "SELECT * FROM sanpham WHERE AnHien = 1 ORDER BY ngayNhap DESC LIMIT 0,10";
        $r = $db->getList($str);
        return $r;
    }

    public function getlistSPlast2()
    {
        $db = new connect();
        $str = "SELECT * FROM sanpham WHERE AnHien = 1 ORDER BY ngayNhap DESC LIMIT 0,5";
        $r = $db->getList($str);
        return $r;
    }

    public function get1SPlast()
    {
        $db = new connect();
        $str = "SELECT * FROM sanpham WHERE AnHien = 1 ORDER BY ngayNhap DESC";
        $r = $db->getInstance($str);
        return $r;
    }

    public function getinstanceSP($id_sp)
    {
        $db = new connect();
        $str = "SELECT a.*, b.ten_loai, b.id_loai FROM sanpham a JOIN loaisanpham b ON a.id_loai = b.id_loai WHERE a.id_sp = $id_sp";
        $r = $db->getinstance($str);
        return $r;
    }

    public function getListCart($id_sp)
    {
        $db = new connect();
        $str = "SELECT a.*, b.ten_loai, b.id_loai FROM sanpham a JOIN loaisanpham b ON a.id_loai = b.id_loai WHERE a.id_sp = $id_sp";
        $r = $db->getlist($str);
        return $r;
    }

    public function ProsRecent($idcate,$id)
    {
        $db = new connect();
        $str = "SELECT a.*, b.* FROM sanpham a JOIN loaisanpham b ON a.id_loai = b.id_loai WHERE a.id_loai = $idcate AND a.id_sp != $id ORDER BY ngayNhap DESC LIMIT 0,4";
        $r = $db->getList($str);
        return $r;
    }

    public function ProsOther()
    {
        $db = new connect();
        $str = "SELECT * FROM sanpham WHERE AnHien = 1 ORDER BY ngayNhap DESC LIMIT 5,15";
        $r = $db->getList($str);
        return $r;
    }

    public function getSlideShow(){
        $db = new connect();
        $str = "SELECT * FROM sanpham a
        JOIN loaisanpham b ON b.id_loai = a.id_loai
        JOIN loailaptop c ON c.id_loailaptop = b.id_loailaptop
        WHERE a.AnHien = 1 AND a.Slideshow = 1";
        $r = $db->getList($str);
        return $r;
    }

    public function themGioHang($id,$soluong){
        if(isset($_SESSION['GH'][$id]))
        {
            $_SESSION['GH'][$id] += $soluong;
        }else{
            $_SESSION['GH'][$id] = $soluong;
        }
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

    public function CssMess(){
        if($_SESSION['Cart']['thongbao'] == 'Incorrect discount code'){
            return "style=background-color:red";
        }else{
            return "style=background-color:green";
        }
    }
}
?>