<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <?php foreach ($getlistsp as $r) { ?>
                    <div class="thubmnail-recent">
                        <img src="views/images/<?= $r['image'] ?>" class="recent-thumb" alt="">
                        <h2><a href="?action=chitietsp&id=<?= $r['id_sp'] ?>"><?= $r['ten_sp'] ?></a></h2>
                        <div class="product-sidebar-price">
                            <?php if($r["giam_gia"] == '' || $r["giam_gia"] == 0){ ?>
                            <ins><?= $d->formatMoney($r['gia_goc'])?> VNĐ</ins>
                            <?php }else{ ?>
                            <ins><?= $d->formatMoney($r['giam_gia'])?> VNĐ</ins> <del>
                                    <?= $d->formatMoney($r['gia_goc'])?> VNĐ</del>
                                    <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products Other</h2>
                    <ul>
                        <?php foreach ($getProsOther as $r) { ?>
                        <li><a href="?action=chitietsp&id=<?= $r['id_sp'] ?>"><?= $r['ten_sp'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php if($tongtien == 0) {
                echo "<h2>You have no products in your cart, please <a href='?action=shoppage'>select products</a> before using the checkout function</h2>";
            } else { ?>
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <?php if($_SESSION['id_kh'] == null) { ?>
                        <div class="woocommerce-info">Sign in to continue paying<a class="showlogin"
                                data-toggle="collapse" href="#login-form-wrap" aria-expanded="false"
                                aria-controls="login-form-wrap"> Click here
                                to login</a>
                        </div>

                        <form id="login-form-wrap" action="login.php" class="login collapse" method="post">


                            <p>If you have shopped with us before, please enter your details in the boxes below. If you
                                are a new customer please proceed to the Billing &amp; Shipping section.</p>

                            <p class="form-row form-row-first">
                                <label for="username">Email <span class="required">*</span>
                                </label>
                                <input type="text" id="username" name="email" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="password">Password <span class="required">*</span>
                                </label>
                                <input type="password" id="password" name="pass" class="input-text">
                            </p>
                            <div class="clear"></div>


                            <p class="form-row">
                                <input type="submit" value="Login" name="btn" class="button">
                                <label class="inline" for="rememberme"><input type="checkbox" value="forever"
                                        id="rememberme" name="rememberme"> Remember me </label>
                            </p>
                            <p class="lost_password">
                                <a href="#">Lost your password?</a>
                            </p>

                            <div class="clear"></div>
                        </form>

                        <?php } ?>

                        <?php if($_SESSION['Cart']['tonggia'] == null){ ?>
                        <div class="woocommerce-info">Have a coupon? <a class="showcoupon" data-toggle="collapse"
                                href="#coupon-collapse-wrap" aria-expanded="false"
                                aria-controls="coupon-collapse-wrap">Click here to enter your code</a>
                        </div>

                        <form id="coupon-collapse-wrap" method="post" action="?action=ActionCart"
                            class="checkout_coupon collapse">

                            <p class="form-row form-row-first">
                                <input type="text" value="" id="coupon_code" placeholder="Coupon code"
                                    class="input-text" name="coupon_code">
                            </p>

                            <p class="form-row form-row-last">
                                <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                            </p>

                            <div class="clear"></div>
                        </form>
                        <?php } ?>

                        <form enctype="multipart/form-data" action="?action=Addcheckout" class="checkout" method="post" name="checkout">

                            <div id="customer_details" class="col2-set">
                                <div class="col-3" style="margin-left: 20%">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Billing Details</h3>

                                        <p id="billing_first_name_field"
                                            class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Họ và tên <abbr title="required"
                                                    class="required">*</abbr>
                                            </label>
                                            <input type="text" placeholder=""
                                                value="<?= isset($_SESSION['ten_kh']) ? $_SESSION['ten_kh'] : '' ?>"
                                                id="billing_first_name" name="hoten" class="input-text"
                                                <?= isset($_SESSION['ten_kh']) ? 'readonly' : '' ?> required>
                                        </p>
                                        <?php if(isset($_SESSION['id_kh']) == false){ ?>
                                        <p id="billing_first_name_field"
                                            class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Username <abbr title="required"
                                                    class="required">*</abbr>
                                            </label>
                                            <input type="text" placeholder="" value="" id="billing_first_name" name="username" class="input-text">
                                        </p>
                                        <?php } ?>

                                        <p id="billing_last_name_field"
                                            class="form-row form-row-last validate-required">
                                            <label class="" for="billing_last_name">Email Adress<abbr title="required"
                                                    class="required">*</abbr>
                                            </label>
                                            <input type="email"
                                                value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>"
                                                placeholder="" id="billing_last_name" name="email" class="input-text" style="width: 100%"
                                                required <?= isset($_SESSION['email']) ? 'readonly' : '' ?>>
                                        </p>
                                        <div class="clear"></div>

                                        <p id="billing_company_field" class="form-row form-row-wide">
                                            <label class="" for="billing_company">Phone</label>
                                            <input type="text"
                                                value="<?= isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>"
                                                placeholder="" id="billing_company" name="phone" class="input-text"
                                                <?= isset($_SESSION['phone']) ? 'readonly' : '' ?> required>
                                        </p>

                                        <p id="billing_address_1_field"
                                            class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_address_1">Address <abbr title="required"
                                                    class="required">*</abbr>
                                            </label>
                                            <textarea placeholder="Street address" id="billing_address_1" name="diachi"
                                                class="input-text" required
                                                <?= isset($_SESSION['diachi']) ? 'readonly' : '' ?>><?= isset($_SESSION['diachi']) ? $_SESSION['diachi'] : '' ?>
                                            </textarea>
                                            <?php if(isset($_SESSION['diachi'])){ ?>
                                            <textarea placeholder="change the address" id="billing_address_2"
                                                name="diachi2" class="input-text"></textarea>
                                            <?php } ?>
                                        </p>

                                        <p id="billing_address_1_field"
                                            class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_address_1">Ghi chú</abbr>
                                            </label>
                                            <textarea id="billing_address_1" name="ghichu"
                                                class="input-text"></textarea>
                                        </p>

                                        <div class="clear"></div>

                                        <?php if(isset($_SESSION['id_kh']) == false){ ?>
                                        <div class="create-account">
                                            <p>Create an account by entering the information below. If you are a
                                                returning customer please login at the top of the page.</p>
                                            <p id="account_password_field" class="form-row validate-required">
                                                <label class="" for="account_password">Account password <abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="password" value="" placeholder="Password"
                                                    id="account_password" name="account_password" class="input-text">
                                            </p>
                                            <div class="clear"></div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>

                            </div>

                            <h3 id="order_review_heading">Your order</h3>

                            <div id="order_review" style="position: relative;">
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($_SESSION['GH'] as $id=>$soluong) {
                                                $getProDetail = $d->getListCart($id);
                                                foreach($getProDetail as $sp){
                                        ?>
                                        <tr class="cart_item">
                                            <td class="product-name" style="font-size: 15px">
                                                <?= $sp['ten_sp'] ?> <strong class="product-quantity">×
                                                    <?= $soluong ?></strong> </td>
                                            <td class="product-total">
                                                <span class="amount"><?= $d->formatMoney($_SESSION['total'][$id])?>
                                                    VNĐ</span>
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                    <tfoot>

                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount"><?= $tongtien ?> VNĐ</span></span>
                                            </td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <?php if(isset($_SESSION['Cart']['tonggia'])){ ?>
                                        <tr class="shipping">
                                            <th>COUPON (5%)</th>
                                            <td style="color: green; font-weight: bolder"><?= $d->formatMoney($_SESSION['tongtien'] * 0.05) ?> VNĐ</td>
                                        </tr>
                                        <?php } ?>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount"><?php   if(isset($_SESSION['Cart']['tonggia'])){
                                                            echo $d->formatMoney($_SESSION['Cart']['tonggia']).' VNĐ';
                                                        }else{
                                                            echo $d->formatMoney($_SESSION['tongtien'] * 1.1).' VNĐ';
                                                        }?></span></strong> </td>
                                        </tr>

                                    </tfoot>
                                </table>


                                <div id="payment">
                                    <div class="form-row place-order">

                                        <input type="submit" data-value="Place order" value="Place order"
                                            id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                    </div>

                                    <div class="clear"></div>

                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>