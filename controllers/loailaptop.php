<?php
    include_once("../models/connect.php");
    include_once("../models/Admin/loailaptop.php");
    $act = 'index';
    if(isset($_GET["act"])){
        $act = $_GET["act"];
    }
    $l = new loailaptop();
    switch($act){
        case 'index': 
            $selectAll = false;
            $r = $l->getlistlaptop();
            include ("../admin/loailaptop/index.php");
            break;
        
        case 'add':
            include ("../admin/loailaptop/add.php");
            break;

        case 'insert':
            $name = $_POST['txtTen'];
            $r=$l->getlistlaptop();
            foreach($r as $row){
                if($row[1] == $name){
                    $_SESSION['messge_error'] = "Tên bạn nhập đã tồn tại!";
                    header("location:?ctrl=loailaptop");
                    return false;
                }
            }
            $l->addLoailaptop($name);
            $_SESSION['messge'] = 'Thêm thành công';
            header('location:admin.php?ctrl=loailaptop');
            break;
        case 'delete':
            $idcate = $_GET['id'];
            $l->deleteLoailaptop($idcate);
            $_SESSION['messge'] = "Xóa thành công";
            header("location: admin.php?ctrl=loailaptop");
            break;
        case 'edit':
            $idloai = $_GET['id'];
            $cata = $l->get1catelaptop($idloai);
            include ("../admin/loailaptop/edit.php");
            break;
        case 'update':
            $namecate = $_POST['txtTen'];
            $idcate = $_POST['txtMa'];
            $r=$l->getlistlaptop();
            foreach($r as $row){
                if($row[1] == $namecate && $row[0] != $idcate){
                    $_SESSION['messge_error'] = "Tên bạn nhập đã tồn tại!";
                    header("location:?ctrl=loailaptop");
                    return false;
                }
            }
            $l->updateLoailaptop($idcate,$namecate);
            $_SESSION['messge'] = "Cập nhật thành công";
            header("location:admin.php?ctrl=loailaptop");
            break;
    }
?>