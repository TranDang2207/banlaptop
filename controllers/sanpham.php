<?php
    include_once("../models/connect.php");
    include_once("../models/Admin/sp.php");
    $act = 'index';
    if(isset($_GET["act"])){
        $act = $_GET["act"];
    }
    $l = new sp();
    switch($act){
        case 'index': 
            $selectAll = false;
            $r = $l->getlistSP();
            include ("../admin/sanpham/index.php");
            break;
        
        case 'add':
            $listcate = $l->listCatePro();
            include ("../admin/sanpham/add.php");
            break;

        case 'insert':
            $name = $_POST['txtTen'];
            $mota = $_POST['content'];
            $id_loai = $_POST['idcate'];
            $price = $_POST['price'];
            $price2 = $_POST['price2'];
            if($price <= 0){
                $_SESSION['messge_error'] = 'Giá tiền phải lớn hơn 0';
                header('location:admin.php?ctrl=sanpham');
                return false;
            }
            if($price2 >= $price){
                $_SESSION['messge_error'] = 'Giá khuyến mãi cao hơn giá gốc';
                header('location:admin.php?ctrl=sanpham');
                return false;
            }
            $img = $_POST['img'];
            $img = explode("/", $img);
            $img = $img[6];
            $AnHien = $_POST['flexRadioDefault'];
            $l->addSP($name,$img,$price,$price2,$id_loai,$mota,$AnHien);
            $_SESSION['messge'] = "Thêm thành công";
            header('location:admin.php?ctrl=sanpham');
            break;
        case 'delete':
            $idcate = $_GET['id'];
            $l->deleteSP($idcate);
            $_SESSION['messge'] = "Xóa thành công";
            header("location: admin.php?ctrl=sanpham");
            break;
        case 'edit':
            $idsp = $_GET['id'];
            $Pros = $l->getinstanceSP($idsp);
            $listcate = $l->listCatePro();
            include ("../admin/sanpham/edit.php");
            break;
        case 'update':
            $idsp = $_GET['id'];
            $name = $_POST['txtTen'];
            $mota = $_POST['content'];
            $id_loai = $_POST['idcate'];
            $price = $_POST['price'];
            $price2 = $_POST['price2'];
            if($price <= 0){
                $_SESSION['messge_error'] = 'Giá tiền phải lớn hơn 0';
                header("location:admin.php?ctrl=sanpham");
                return false;
            }
            if($price2 >= $price){
                $_SESSION['messge_error'] = 'Giá khuyến mãi cao hơn giá gốc';
                header('location:admin.php?ctrl=sanpham');
                return false;
            }
            $img = $_POST['img'];
            $img = explode("/", $img);
            $img = $img[6];
            $AnHien = $_POST['flexRadioDefault'];
            $l->updateSP($idsp,$name,$img,$price,$price2,$id_loai,$mota,$AnHien);
            $_SESSION['messge'] = "Cập nhật thành công";
            header("location:admin.php?ctrl=sanpham");
            break;
    }
?>