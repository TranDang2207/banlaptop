<?php
    $action = 'index';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    switch($action){
        case 'shoppage':
            include('views/sanpham.php');
            break;
        case 'chitietsp':
            $id = $_GET['id'];
            $getProDetail = $d->getinstanceSP($id);
            $idcate = $getProDetail['id_loai'];
            $getProsRecent2 = $d->ProsRecent($idcate,$id);
            $getlistsp = $d->getlistSPlast2();
            $getProsOther = $d->ProsOther($idcate);
            include('views/detailsp.php');
            break;
        case 'logout':
            session_destroy();
            header("location:./");
            break;
        case 'addCart':
            if(isset($_POST['quantity']) == false){
                $id = $_GET['id'];
                $getProDetail = $d->getListCart($id);
                $soluong = 1;
                foreach($getProDetail as $r){
                    if($r['giam_gia'] == 0 || $r['giam_gia'] == null){
                        $_SESSION['total'][$id] = ($r['gia_goc'] * $soluong);
                    }else{
                        $_SESSION['total'][$id] = ($r['giam_gia'] * $soluong);
                    }
                }
                $_SESSION['tongtien'] += $_SESSION['total'][$id];
                $d->themGioHang($id,$soluong);
                header('location:'.$geturl);
            }else{
                $id = $_POST['id'];
                $getProDetail = $d->getListCart($id);
                $soluong = $_POST['quantity'];
                foreach($getProDetail as $r){
                    if($r['giam_gia'] == 0 || $r['giam_gia'] == null){
                        $_SESSION['total'][$id] += ($r['gia_goc'] * $soluong);
                    }else{
                        $_SESSION['total'][$id] += ($r['giam_gia'] * $soluong);
                    }
                }
                $_SESSION['tongtien'] += $_SESSION['total'][$id];
                $d->themGioHang($id,$soluong);
                header('location:'.$geturl);
            }
            break;
        case 'cart':
            include('views/cart.php');
            break;
        case 'removeCart':
            $id = $_GET['id'];
            $_SESSION['tongtien'] -= $_SESSION['total'][$id];
            unset($_SESSION['GH'][$id]);
            header('location:?action=cart');
            break;
        case 'ActionCart':
            if(isset($_POST['apply_coupon'])){
                    $_SESSION['Cart']['coucode'] = $_POST['coupon_code'];
                    if($_SESSION['Cart']['coucode'] != 'DANGVIPPRO'){
                        $_SESSION['Cart']['thongbao']='Incorrect discount code';
                        unset($_SESSION['Cart']['coucode']);
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }else{
                        $_SESSION['Cart']['thongbao']='Use discount code successfully';
                        $_SESSION['Cart']['tonggia'] = $_SESSION['tongtien'] * 0.95;
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
            }
            if(isset($_POST['cancel_coupon'])){
                unset($_SESSION['Cart']['tonggia']);
                unset($_SESSION['Cart']['coucode']);
                header('location:?action=cart');
            }
            if(isset($_POST['update_cart'])){
                foreach($_SESSION['GH'] as $id=>$soluong){
                    $quantity = $_POST['quantity'.$id];
                    if($quantity == 0){
                        $_SESSION['tongtien'] -= $_SESSION['total'][$id];
                        unset($_SESSION['GH'][$id]);
                    }else{
                        $_SESSION['tongtien'] -= $_SESSION['total'][$id];
                        $_SESSION['GH'][$id] = $quantity;
                        $getProDetail = $d->getListCart($id);
                        foreach($getProDetail as $r){
                            if($r['giam_gia'] == 0 || $r['giam_gia'] == null){
                                $_SESSION['total'][$id] = $r['gia_goc'] * $quantity;
                            }else{
                                $_SESSION['total'][$id] = $r['giam_gia'] * $quantity;
                            }
                        }
                        $_SESSION['tongtien'] += $_SESSION['total'][$id];
                    }
                }
                header('location:?action=cart');
            }
            if(isset($_POST['checkout_cart'])){
                header('location:?action=checkout');
            }
            break;
        case 'checkout':
            $getProsOther = $d->ProsOther($idcate);
            $getlistsp = $d->getlistSPlast2();
            include('views/checkout.php');
            break; 
        case 'Addcheckout':
            if(isset($_SESSION['id_kh'])){
                if($_POST['diachi2'] != ''){
                    $diachi = $_POST['diachi2'];
                    $id = $_SESSION['id_kh'];
                    $User->updateKHCheckout($id,$diachi);
                }
                $idkh = $_SESSION['id_kh'];
                $ghichu = $_POST['ghichu'];
                $email = $_SESSION['email'];
                $username = $_SESSION['username'];
                $trangthai = 0;
                if(isset($_SESSION['Cart']['tonggia'])){
                    $tonghd = $_SESSION['Cart']['tonggia'];
                }else{
                    $tonghd = $_SESSION['tongtien'];
                }
                $soluong = count($_SESSION['GH']);
                $idDH = $dh->addDH($idkh,$tonghd,$trangthai,$soluong,$ghichu);
                foreach($_SESSION['GH'] as $id=>$soluong){
                    $giatien = $_SESSION['total'][$id];
                    $dh->addOrderDetail($idDH,$id,$soluong,$giatien);
                }
                $OrderDetail = $dh->getlistOderDetail($idDH);
                $getDH = $dh->getinstanceDH($idDH);
                if($getDH['trangthai'] == 0){
                    $quyen = 'Chờ xác nhận';
                }else if ($getDH['trangthai'] == 1){
                    $quyen = 'Đang giao hàng';
                }else if ($getDH['trangthai'] == 2){
                    $quyen = 'Đã giao hàng';
                }else{
                    $quyen = 'Đã hủy';
                }

                $headermail = '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
                <!-- CSS only -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
                </script>
                <link href="../admin/donhang/style.css" rel="stylesheet" />
                
                <div class="page-content container">
                    <div class="page-header text-blue-d2">
                        <h1 class="page-title text-secondary-d1">
                            Hóa đơn
                            <small class="page-info">
                                <i class="fa fa-angle-double-right text-80"></i>
                                ID: #'.$getDH['id_hd'].'
                            </small>
                        </h1>
                
                    <div class="container px-0">
                        <div class="row mt-4">
                            <div class="col-12 col-lg-10 offset-lg-1">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center text-150">
                                            <img src="../views/images/logo.svg" style="width: 20%" alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->
                
                                <hr class="row brc-default-l1 mx-n1 mb-4" />
                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <span class="text-sm text-grey-m2 align-middle">Đến:</span>
                                            <span class="text-600 text-110 text-blue align-middle">Thanh Dang</span>
                                        </div>
                                        <div class="text-grey-m2">
                                            <div class="my-1">
                                                Địa chỉ: '.$getDH['dia_chi'].'
                                            </div>
                                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                                    class="text-600">Điện thoại: <a
                                                        href="tel:'.$getDH['phone'].'">'.$getDH['phone'].'</a></b></div>
                                            <div class="my-1"><i class="fa fa-envelope" aria-hidden="true"></i> <b
                                                    class="text-600">Email: <a
                                                        href="mailto:'.$getDH['email'].'">mailto:'.$getDH['email'].'</a></b></div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                
                                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                        <hr class="d-sm-none" />
                                        <div class="text-grey-m2">
                                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                Hóa đơn
                                            </div>
                
                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                    class="text-600 text-90">ID:</span> #'.$getDH['id_hd'].'</div>
                
                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                    class="text-600 text-90">Ngày mua:</span>
                                                '.date('d/m/Y',strtotime($getDH['ngay'])).'</div>
                
                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                    class="text-600 text-90">Trạng thái:</span>
                                                    <span>'.$quyen.'</span>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="row">
                                        <div class="table-responsive my-4">
                                            <table class="table table-striped"  border=1>
                                                <thead class="bgc-default-tp1 text-white">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Tên sản phẩm</th>
                                                        <th scope="col">Loại sản phẩm</th>
                                                        <th scope="col">Đơn giá</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody> ';
                                                $bodymail ='';
                        foreach($OrderDetail as $r) {   
                            if($r['giam_gia'] == null || $r['giam_gia'] == 0){
                                $price = $d->formatMoney($r['gia_goc']);
                            }else{
                                $price = $d->formatMoney($r['giam_gia']);
                            }        
                            $bodymail .= '  
                            <tr>
                            <td scope="col">'.$r['id_sp'].'</td>
                            <td scope="col">'.$r['ten_sp'].'</td>
                            <td scope="col">'.$r['ten_loai'].'</td>
                            <td scope="col">'.$price.'</td>
                            <td scope="col">'.$r['soluong'].'</td>
                            <td scope="col">'.$r['giatien'].'</td>
                        </tr>';
            
                        }   
                                      $footermail = '
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                
                                    <div class="row border-b-2 brc-default-l2"></div>
                
                                    <!-- or use a table instead -->
                
                                    <!-- <div class="table-responsive">
                                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                    <thead class="bg-none bgc-default-tp1">
                                        <tr class="text-white">
                                            <th class="opacity-2">#</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th width="140">Amount</th>
                                        </tr>
                                    </thead>
                
                                    <tbody class="text-95 text-secondary-d3">
                                        <tr></tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Domain registration</td>
                                            <td>2</td>
                                            <td class="text-95">$10</td>
                                            <td class="text-secondary-d2">$20</td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div> -->
<div class="row mt-3">
    <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
        Ghi chú (Ghi chú bổ sung như thông tin công ty hoặc thanh toán)
        <hr>
        <div>'.$getDH['ghichu'].'</div>
    </div>

    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
        <div class="row my-2">
            <div class="col-7 text-right">
                Tổng phụ
            </div>
            <div class="col-5">
                <span class="text-120 text-secondary-d1">'.$d->formatMoney($_SESSION['tongtien']).' VNĐ</span>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-7 text-right">
                Giảm giá (5%)
            </div>
            <div class="col-5">
                <span class="text-110 text-secondary-d1">'.$d->formatMoney($_SESSION['tongtien'] * 0.05).' VNĐ</span>
            </div>
        </div>

        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
            <div class="col-7 text-right">
                Tổng tiền
            </div>
            <div class="col-5">
                <span class="text-150 text-success-d3 opacity-2">'.$d->formatMoney($tonghd).' VNĐ</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>';

$finalmail =$headermail.$bodymail.$footermail;  

$mail->sendmail($email,$username,$finalmail);
unset($_SESSION['GH']);
unset($_SESSION['Cart']);
unset($_SESSION['tongtien']);
$_SESSION['success'] = 'success';
header('location:/PHP2/');
}else{
$hoten = $_POST['hoten'];
$username = $_POST['username'];
$pass = $_POST['password'];
$pass = md5($pass);
$email = $_POST['email'];
$phone = $_POST['phone'];
$quyen = 0;
$diachi = $_POST['diachi'];
$r=$User->getlistKH();
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
$last_id = $User->addKH($hoten,$pass,$email,$diachi,$phone,$username,$quyen);
$r = $User->login($email,$pass);
$_SESSION['id_kh'] = $r['id_kh'];
$_SESSION['ten_kh'] = $r['ten_kh'];
$_SESSION['username'] = $r['username'];
$_SESSION['email'] = $r['email'];
$_SESSION['phone'] = $r['phone'];
$_SESSION['quyen'] = $r['phanquyen'];
$_SESSION['diachi'] = $r['dia_chi'];
header('Location: ' . $_SERVER['HTTP_REFERER']);
$ghichu = $_POST['ghichu'];
$trangthai = 0;
if(isset($_SESSION['Cart']['tonggia'])){
$tonghd = $_SESSION['Cart']['tonggia'];
}else{
$tonghd = $_SESSION['tongtien'];
}
$soluong = count($_SESSION['GH']);
$dh->addDH($last_id,$tonghd,$trangthai,$soluong,$ghichu);
$idDH = $dh->addDH($idkh,$tonghd,$trangthai,$soluong,$ghichu);
foreach($_SESSION['GH'] as $id=>$soluong){
$giatien = $_SESSION['total'][$id];
$dh->addOrderDetail($idDH,$id,$soluong,$giatien);
}
$OrderDetail = $dh->getlistOderDetail($idDH);
$getDH = $dh->getinstanceDH($idDH);
$bodyMail = include_once('../hoadon.php');
$mail->sendmail($email,$username,$bodyMail);
unset($_SESSION['GH']);
unset($_SESSION['Cart']);
unset($_SESSION['tongtien']);
$_SESSION['success'] = 'Success';
header('location:/PHP2/');
}
break;
case 'myCart':
include_once('views/myCart.php');
break;
case 'MyAccount':
if(isset($_SESSION['id_kh'])){
$getProsOther = $d->ProsOther($idcate);
$getlistsp = $d->getlistSPlast2();
include_once('views/MyAccount.php');
}else{
$_SESSION['error']['myaccount'] = 'Login to use this function';
header('location:/PHP2/');
}
break;
default:
include('views/layout.php');
}
?>