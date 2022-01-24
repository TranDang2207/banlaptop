<?php
class loailaptop
{
    var $id_loailaptop = null;
    var $ten_loailaptop = null;
    
    public function __construct()
    {
        if(func_num_args() == 2){
            $this->maloailaptop = func_num_args(0);
            $this->ten_loailaptop = func_num_args(1);
        }
    }

    public function getlistlaptop()
    {
        $db = new connect();
        $str = "SELECT * FROM loailaptop";
        $r = $db->getList($str);
        return $r;
    }

    public function get1catelaptop($maloailaptop)
    {
        $db = new connect();
        $str = "SELECT * FROM loailaptop WHERE loailaptop.id_loailaptop = $maloailaptop";
        $r = $db->getInstance($str);
        return $r;
    }

    public function addLoailaptop($tenloailaptop)
    {
        $db = new connect();
        $str = "INSERT INTO loailaptop (id_loailaptop , ten_loailaptop)
        VALUES (null, '".$tenloailaptop."');";
        $r = $db->exec($str);
        return $r;
    }

    public function updateLoailaptop($maloailaptop, $tenloailaptop)
    {
        $db = new connect();
        $str = "UPDATE loailaptop SET ten_loailaptop = '$tenloailaptop' WHERE id_loailaptop =  $maloailaptop";
        $r = $db->exec($str);
        return $r;
    }

    public function deleteLoailaptop($maloailaptop)
    {
        $db = new connect();
        $str = "DELETE FROM loailaptop WHERE id_loailaptop = $maloailaptop";
        $r = $db->exec($str);
        return $r;
    }
}
?>