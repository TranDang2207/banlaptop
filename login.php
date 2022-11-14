<?php
	session_start();
	if(isset($_SESSION['quyen'])){
		if($_SESSION['quyen'] == 1){
            header('location:/controllers/admin.php');
        }else{
            header('location:/');
        }
	}else{
    include_once('models/connect.php');
    include_once('models/Admin/khachhang.php');
    $l = new khachhang();
    if(isset($_POST['btn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $checkbox = $_POST['remember_me'];
        $r = $l->login($email,$pass);
        if($r == null){
            $thongbao = 'Sai tài khoản hoặc mật khẩu';
        }else{
            $_SESSION['id_kh'] = $r['id_kh'];
            $_SESSION['ten_kh'] = $r['ten_kh'];
            $_SESSION['username'] = $r['username'];
            $_SESSION['email'] = $r['email'];
            $_SESSION['phone'] = $r['phone'];
            $_SESSION['quyen'] = $r['phanquyen'];
            $_SESSION['diachi'] = $r['dia_chi'];
            if($checkbox == true){
                setcookie('id_kh',$r['id_kh'],time()+(3600+24*7),"/","",0); 
                setcookie('ten_kh',$r['ten_kh'],time()+(3600+24*7),"/","",0); 
                setcookie('username',$r['username'],time()+(3600+24*7),"/","",0); 
                setcookie('email',$r['email'],time()+(3600+24*7),"/","",0); 
                setcookie('phone',$r['phone'],time()+(3600+24*7),"/","",0); 
                setcookie('quyen',$r['phanquyen'],time()+(3600+24*7),"/","",0); 
                setcookie('diachi',$r['dia_chi'],time()+(3600+24*7),"/","",0); 
            }
			header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="views/Login_v18/image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="views/Login_v18/css/util.css">
    <link rel="stylesheet" type="text/css" href="views/Login_v18/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="">
                    <span class="login100-form-title p-b-43">
                        Login to continue
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    <?php if(isset($thongbao)){ ?>
						<div class="alert alert-danger" role="alert">
							<strong><?= $thongbao ?></strong>
						</div>
                    <?php } ?>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <a href="/register.php" class="txt2">
                            or sign up using
                        </a>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('views/Login_v18/images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="views/Login_v18/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="views/Login_v18/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="views/Login_v18/vendor/bootstrap/js/popper.js"></script>
    <script src="views/Login_v18/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="views/Login_v18/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="views/Login_v18/vendor/daterangepicker/moment.min.js"></script>
    <script src="views/Login_v18/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="views/Login_v18/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="views/Login_v18/js/main.js"></script>

</body>

</html>
<?php } ?>