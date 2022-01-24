<?php
    include_once("../models/connect.php");
    include_once("../models/Admin/loaisp.php");
    $act = 'index';
    if(isset($_GET["act"])){
        $act = $_GET["act"];
    }
    $l = new loaisp();
    switch($act){
        case 'index': 
            $selectAll = false;
            $r = $l->getlist();
            include ("../admin/loaisp/index.php");
            break;
        
        case 'add':
            $listcate = $l->getlistlaptop();
            include ("../admin/loaisp/add.php");
            break;

        case 'insert':
            $name = $_POST['txtTen'];
            $anhien = $_POST['flexRadioDefault'];
            $idlaptop = $_POST['idcate'];
            $r=$l->getlist();
            foreach($r as $row){
                if($row[1] == $name){
                    $_SESSION['messge_error'] = "Tên bạn nhập đã tồn tại!";
                    header("location:?ctrl=loaisp");
                    return false;
                }
            }
            $l->addLoai($name,$anhien,$idlaptop);
            $_SESSION['messge'] = 'Thêm thành công';
            header('location:admin.php?ctrl=loaisp');
            break;
        case 'delete':
            $idcate = $_GET['id'];
            $l->deleteLoai($idcate);
            $_SESSION['messge'] = "Xóa thành công";
            header("location: admin.php?ctrl=loaisp");
            break;
        case 'edit':
            $idloai = $_GET['id'];
            $cata = $l->get1cate($idloai);
            $listcate = $l->getlistlaptop();
            include ("../admin/loaisp/edit.php");
            break;
        case 'update':
            $namecate = $_POST['txtTen'];
            $idcate = $_POST['txtMa'];
            $idlaptop = $_POST['idcate'];
            $anhien = $_POST['flexRadioDefault'];
            $r=$l->getlist();
            foreach($r as $row){
                if($row[1] == $namecate && $row[0] != $idcate){
                    $_SESSION['messge_error'] = "Tên bạn nhập đã tồn tại!";
                    header("location:?ctrl=loaisp");
                    return false;
                }
            }
            $l->updateLoai($idcate,$namecate,$anhien,$idlaptop);
            $_SESSION['messge'] = "Cập nhật thành công";
            header("location:admin.php?ctrl=loaisp");
            break;
    }
?>