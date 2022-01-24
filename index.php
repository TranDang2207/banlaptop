<?php
session_start();
ob_start();
include_once("models/User/loaisp.php");
include_once("models/User/sp.php");
include_once("models/User/khachhang.php");
include_once("models/connect.php");
include_once("models/User/donhang.php");
include_once("mail/sendmail.php");
$mail = new Mailer();
$User = new khachhangUser();
$l = new loaispUser();
$r = $l->getlist();
$d = new spUser();
$t = $d->getlistSPlast();
$slide = $d->getSlideShow();
$getlistPro = $d->getlistSP();
$get1Prolast = $d->get1SPlast();
$geturl = $_SERVER['HTTP_REFERER'];
if(isset($_SESSION['tongtien'])==false){
    $_SESSION['tongtien'] = 0;
}
$dh = new donhangUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GearVN</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
        type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="views/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="views/css/owl.carousel.css">
    <link rel="stylesheet" href="views/style.css">
    <link rel="stylesheet" href="views/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
#tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

#tooltip #tooltiptext {
    width: 120px;
    background-color: #198754;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: 120%;
    left: 50%;
    margin-left: -60px;
}

#tooltip #tooltiptext::after {
    content: "";
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent transparent black transparent;
}

#tooltip:hover #tooltiptext {
    visibility: visible;
}
</style>

<body>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul style="position: relative">
                            <li id="tooltip"><a href="?action=MyAccount"><i class="fa fa-user"></i> My Account</a>
                            <?php if(isset($_SESSION['error']['myaccount'])) { 
                                    echo "<span id='tooltiptext' style='background-color: #dc3545'>".$_SESSION['error']['myaccount']."</span>";
                                    unset($_SESSION['success']);
                                } ?>
                        </li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li id="tooltip"><a href="?action=cart"><i class="fa fa-user"></i> My Cart</a>
                                <?php if(isset($_SESSION['success'])) { 
                                    echo "<span id='tooltiptext'>".$_SESSION['success']."</span>";
                                    unset($_SESSION['success']);
                                } ?>
                            </li>
                            <li><a href="?action=checkout"><i class="fa fa-user"></i> Checkout</a></li>
                            <?php if(isset($_SESSION['id_kh'])) {?>
                            <li><a href="?action=logout"><i class="fa fa-user"></i> logout</a></li>
                            <?php } else { ?>
                            <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                        class="key">currency :</span><span class="value">VNĐ</span></a>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                        class="key">language :</span><span class="value">English </span></b></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="views/images/logo.svg" style="width: 180px"></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="?action=cart">Cart - <span
                                class="cart-amunt"><?php $tongtien = $d->formatMoney($_SESSION['tongtien']); echo $tongtien ;?>
                                VNĐ</span> <i class="fa fa-shopping-cart"></i> <?php if(isset($_SESSION['GH'])){
                            $quantity = count($_SESSION['GH']); echo '<span class="product-count">' .$quantity . '</span>';
                        } ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php $action = $_GET['action']; if($action == '') echo 'active' ?>"><a href="./"
                                id="aactive">Home</a></li>
                        <li class="<?php $action = $_GET['action']; if($action == 'shoppage') echo 'active' ?>"><a
                                href="?action=shoppage" id="aactive">Shop page</a></li>
                        <li class="<?php $action = $_GET['action']; if($action == 'chitietsp') echo 'active' ?>"><a
                                href="?action=chitietsp&id=<?= $get1Prolast['id_sp'] ?>" id="aactive">Single product</a>
                        </li>
                        <li class="<?php $action = $_GET['action']; if($action == 'cart') echo 'active' ?>"><a
                                href="?action=cart" id="aactive">Cart</a></li>
                        <li class="<?php $action = $_GET['action']; if($action == 'checkout') echo 'active' ?>"><a
                                href="?action=checkout" id="aactive">Checkout</a></li>
                        <li class="<?php $action = $_GET['action']; if($action == 'chitietsp') echo 'active' ?>"><a
                                href="#" id="aactive">Category</a></li>
                        <li class="<?php $action = $_GET['action']; if($action == 'chitietsp') echo 'active' ?>"><a
                                href="#" id="aactive">Others</a></li>
                        <li class="<?php $action = $_GET['action']; if($action == 'chitietsp') echo 'active' ?>"><a
                                href="#" id="aactive">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <?php include('controllers/user.php'); ?>

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <img src="views/images/logo.svg" style="width: 180px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero
                            quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi
                            iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi
                            veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to
                            your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com"
                                target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="views/js/owl.carousel.min.js"></script>
    <script src="views/js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="views/js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="views/js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="views/js/bxslider.min.js"></script>
    <script type="text/javascript" src="views/js/script.slider.js"></script>
</body>

</html>