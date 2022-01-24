<?php
    include_once("../models/connect.php");
    include_once("../models/Admin/khachhang.php");
    $act = 'index';
    if(isset($_GET["act"])){
        $act = $_GET["act"];
    }
    $l = new khachhang();
    switch($act){
        case 'index': 
            $selectAll = false;
            $r = $l->getlistKH();
            include ("../admin/khachhang/index.php");
            break;
        
        case 'add':
            include ("../admin/khachhang/add.php");
            break;

        case 'insert':
            $hoten = $_POST['hoten'];
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $pass = md5($pass);
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $quyen = $_POST['inlineRadioOptions'];
            $diachi = $_POST['diachi'];
            $r=$l->getlistKH();
            foreach($r as $row){
                if($row['email'] == $email){
                    $_SESSION['messge_error'] = "Email đã được sử dụng!";
                    header("location:?ctrl=khachhang");
                    return false;
                }
                if($row['phone'] == $phone){
                    $_SESSION['messge_error'] = "Số điện thoại đã được đăng ký";
                    header("location:?ctrl=khachhang");
                    return false;
                }
                if($row['username'] == $username){
                    $_SESSION['messge_error'] = "user đã tồn tại, vui lòng chọn tên khác";
                    header("location:?ctrl=khachhang");
                    return false;
                }
            }
            $l->addKH($hoten,$pass,$email,$diachi,$phone,$username,$quyen);
            $_SESSION['messge'] = 'Thêm thành công';
            header('location:admin.php?ctrl=khachhang');
            break;
        case 'delete':
            $idKH = $_GET['id'];
            $l->deleteKH($idKH);
            $_SESSION['messge'] = "Xóa thành công";
            header("location: admin.php?ctrl=khachhang");
            break;
        case 'edit':
            $idKH = $_GET['id'];
            $getKH = $l->getinstanceKH($idKH);
            include ("../admin/khachhang/edit.php");
            break;
        case 'update':
            $idKH = $_POST['txtMa'];
            $quyen = $_POST['inlineRadioOptions'];
            $l->updateKH($idKH,$quyen);
            $_SESSION['messge'] = "Cập nhật thành công";
            header("location:admin.php?ctrl=khachhang");
            break;
    }
?>