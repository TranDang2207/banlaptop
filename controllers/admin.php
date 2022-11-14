<?php
    session_start();
    ob_start();
    if(isset($_SESSION['id_kh'])){
        if($_SESSION['quyen'] == 0){
            header('location:/');
        }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../admin/donhang/style.css" rel="stylesheet"/>
</head>
<style>
    header{
        height: 280px;
    }
    header>#as{
        border: 2px solid black;
        width: 140px;
        padding-top: 15px;
        height: 60px;
        color: white;
        text-decoration: none;
        background-color: black;
    }
    header>#as:hover{
        color: black;
        background-color: white;
    }
    main, main>article, main>aside{
        min-height: 600px;
    }
    footer{
        height: 50px;
    }
</style>
<body>
    <div class="container-fluid">
        <header class="row bg-info">
            <a href="../index.php" class="text-center fw-bold" id="as">Xem giao diện</a>
            <a href="?ctrl=loaisp" class="m-auto text-center"><img src="../views/images/logo.svg" class="img-fluid col-5" alt="..."></a>
        </header>
        <main class="row">
            <aside class="col-2 bg-dark">
                <div class="row list-group">
                    <a href="?ctrl=loailaptop" class="list-group-item list-group-item-action">Loại laptop</a>
                    <a href="?ctrl=loaisp" class="list-group-item list-group-item-action">Loại sản phẩm</a>
                    <a href="?ctrl=sanpham" class="list-group-item list-group-item-action">Sản phẩm</a>
                    <a href="?ctrl=khachhang" class="list-group-item list-group-item-action">Khách hàng</a>
                    <a href="?ctrl=donhang" class="list-group-item list-group-item-action">Đơn hàng</a>
                    <a href="?ctrl=filemanager" class="list-group-item list-group-item-action">Quản lý file</a>
                    <a href="?ctrl=slideshow" class="list-group-item list-group-item-action">Quản lý slideshow</a>
                    <a href="?ctrl=thongke" class="list-group-item list-group-item-action">Thống kê</a>
                </div>
            </aside>
            <article class="col-10">
                <?php
                    session_start();
                    if(isset($_GET["ctrl"])){
                        $ctrl = $_GET["ctrl"];
                    }else{
                        $ctrl = "loailaptop";
                    }
                    include ("$ctrl.php");
                ?>
            </article>
        </main>
        <footer class="row bg-black"></footer>
    </div>
</body>
<script>
    var currentLocation = location.href;
    const menuItem = document.getElementsByClassName("list-group-item list-group-item-action");
    const menuLength = menuItem.length;
    for(let i = 0; i < menuLength; i++){
        if(currentLocation == "http://localhost/controllers/admin.php"){
            currentLocation = currentLocation.concat('?ctrl=loailaptop'); 
        }
        if(menuItem[i].href == currentLocation){
            menuItem[i].setAttribute("class","list-group-item list-group-item-action active");
        }
    }
</script>
</html>
<?php }
}else{
    header('location:/login.php');
} ?>