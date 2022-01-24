<?php
class donhang
{   
    public function __construct()
    {

    }

    public function getlistDH()
    {
        $db = new connect();
        $str = "SELECT * FROM checkout a JOIN khachhang b ON a.id_kh = b.id_kh ORDER BY ngay DESC";
        $r = $db->getList($str);
        return $r;
    }

    public function getlistDHfiltered($status)
    {
        $db = new connect();
        $str = "SELECT * FROM checkout a JOIN khachhang b ON a.id_kh = b.id_kh WHERE trangthai = $status ORDER BY ngay DESC";
        $r = $db->getList($str);
        return $r;
    }

    public function getinstanceDH($id_dh)
    {
        $db = new connect();
        $str = "SELECT * FROM checkout a JOIN khachhang b ON a.id_kh = b.id_kh WHERE id_hd = $id_dh ORDER BY ngay DESC";
        $r = $db->getinstance($str);
        return $r;
    }

    public function updateDH($id,$status)
    {
        $db = new connect();
        $str = "UPDATE checkout SET trangthai = $status WHERE id_hd = $id";
        $r = $db->exec($str);
        return $r;
    }

    public function deleteDH($idDH)
    {
        $db = new connect();
        $str = "DELETE FROM checkout WHERE id_hd = $idDH";
        $r = $db->exec($str);
        return $r;
    }

    public function getlistOderDetail($idDH)
    {
        $db = new connect();
        $str = "SELECT * FROM checkout_detail a 
        JOIN sanpham b ON a.id_sp = b.id_sp 
        JOIN loaisanpham c ON b.id_loai = c.id_loai
        WHERE id_hd = $idDH";
        $r = $db->getList($str);
        return $r;
    }
}
?>