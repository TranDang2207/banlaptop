<?php
    include_once("../models/connect.php");
    include_once("../models/Admin/donhang.php");
    include_once("../models/Admin/khachhang.php");
    $act = 'index';
    if(isset($_GET["act"])){
        $act = $_GET["act"];
    }
    $l = new donhang();
    $l2 = new khachhang();
    switch($act){
        case 'index': 
            $selectAll = false;
            $r = $l->getlistDH();
            $r2 = $r;
            include ("../admin/donhang/index.php");
            break;
        
        case 'filter':
            $filter = $_POST['filter'];
            if($filter == ''){
                header('location:?ctrl=donhang');
            }
            $r = $l->getlistDHFiltered($filter);
            include ("../admin/donhang/index.php");
            break;

        case 'khachhangdetail':
            $idDH = $_GET['id'];
            $getKH = $l2->getinstanceKH($idDH);
            include ("../admin/donhang/thongtinkhachhang.php");
            break;
        case 'delete':
            $idDH = $_GET['id'];
            $l->deleteDH($idDH);
            $_SESSION['messge'] = "Xóa thành công";
            header("location: admin.php?ctrl=donhang");
            break;
        case 'edit':
            $idDH = $_GET['id'];
            $getDH = $l->getinstanceDH($idDH);
            include ("../admin/donhang/edit.php");
            break;
        case 'update':
            $id = $_POST['txtMa'];
            $status = $_POST['status'];
            $l->updateDH($id,$status);
            $_SESSION['messge'] = "Cập nhật thành công";
            header("location:admin.php?ctrl=donhang");
            break;
        case 'orderdetail':
            $idDH = $_GET['id'];
            $OrderDetail = $l->getlistOderDetail($idDH);
            $getDH = $l->getinstanceDH($idDH);
            include("../admin/donhang/OrderDetail.php");
            break;
    }
?>