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
            $slide = $l->getSlideShow();
            include ("../admin/slideshow/index.php");
            break;
        
        case 'add':
            $r = $l->getlistForSlide();
            include ("../admin/slideshow/add.php");
            break;
        case 'update':
            $id = $_GET['id'];
            $l->addslide($id);
            $_SESSION['messge'] = "Thêm thành công";
            header('location:admin.php?ctrl=slideshow');
            break;
        case 'delete':
            $idcate = $_GET['id'];
            $l->deleteSlide($idcate);
            $_SESSION['messge'] = "Xóa thành công";
            header("location: admin.php?ctrl=slideshow");
            break;
    }
?>