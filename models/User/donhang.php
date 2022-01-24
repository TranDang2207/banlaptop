<?php
class donhangUser
{  
    public function addDH($idkh, $tongtien, $trangthai, $soluong, $ghichu){
        $db = new connect();
        $str = "INSERT INTO checkout (id_hd,id_kh,tongtien,trangthai,num_oder,ghichu) 
        VALUES (null,$idkh,'$tongtien',$trangthai,$soluong,'$ghichu')";
        $r = $db->exec($str);
        return $r;
    }

    public function getlistDH($idkh)
    {
        $db = new connect();
        $str = "SELECT * FROM checkout a JOIN khachhang b ON a.id_kh = b.id_kh WHERE a.id_kh = $idkh ORDER BY ngay DESC";
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

    public function addOrderDetail($idDH,$idSP,$soluong,$giatien)
    {
        $db = new connect();
        $str = "INSERT INTO checkout_detail (id_hdct,id_hd,id_sp,soluong,giatien)
        VALUES (null,$idDH,$idSP,$soluong,$giatien)";
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