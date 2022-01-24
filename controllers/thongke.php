<?php
include_once("../models/connect.php");
include_once("../models/Admin/donhang.php");
include_once("../models/Admin/sp.php");
include_once("../models/Admin/khachhang.php");
$act = 'index';
if(isset($_GET["act"])){
    $act = $_GET["act"];
}
$dh = new donhang();
$sp = new sp();
$user = new khachhang();
switch($act){
    case 'index':
        $order = $dh->getlistDH();
        $pros = $sp->getlistSP();
        $acc = $user->getlistKH();
        $slide = $sp->getSlideShow();
        include('../admin/thongke/index.php');
        break;
    case 'filter':
        $filter = $_POST['filter'];
        if($filter == '5'){
            header('location:?ctrl=thongke&table=order');
        }
        $order = $dh->getlistDHFiltered($filter);
        include("../admin/thongke/index.php");
        break;
}
?>