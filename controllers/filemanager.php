<?php
$act = 'index';
if(isset($_GET["act"])){
        $act = $_GET["act"];
    }
    switch($act){
        case 'index': 
            $selectAll = false;
            include ("../admin/filemanager/index.php");
            break;
        }
?>