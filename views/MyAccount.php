<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2> My Account </h2>
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
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form enctype="multipart/form-data" action="?action=Addcheckout" class="checkout" method="post"
                            name="checkout">

                            <div id="customer_details" class="col-12">
                                <div class="col-3" style="margin: auto">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Account Information</h3>

                                        <p id="billing_first_name_field"
                                            class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Họ và tên <abbr title="required"
                                                    class="required">*</abbr>
                                            </label>
                                            <input type="text" placeholder="" value="<?= $_SESSION['ten_kh'] ?>"
                                                id="billing_first_name" name="hoten" class="input-text" required>
                                        </p>
                                        <p id="billing_first_name_field"
                                            class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Username <abbr title="required"
                                                    class="required">*</abbr>
                                            </label>
                                            <input type="text" placeholder="" value="<?= $_SESSION['username'] ?>"
                                                id="billing_first_name" name="username" class="input-text">
                                        </p>

                                        <p id="billing_last_name_field"
                                            class="form-row form-row-last validate-required">
                                            <label class="" for="billing_last_name">Email Adress<abbr title="required"
                                                    class="required">*</abbr>
                                            </label>
                                            <input type="email" value="<?= $_SESSION['email'] ?>" placeholder=""
                                                id="billing_last_name" name="email" class="input-text"
                                                style="width: 100%" required>
                                        </p>
                                        <div class="clear"></div>

                                        <p id="billing_company_field" class="form-row form-row-wide">
                                            <label class="" for="billing_company">Phone</label>
                                            <input type="text" value="<?= $_SESSION['phone'] ?>" placeholder=""
                                                id="billing_company" name="phone" class="input-text" required>
                                        </p>

                                        <p id="billing_address_1_field"
                                            class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_address_1">Address <abbr title="required"
                                                    class="required">*</abbr>
                                            </label>
                                            <textarea placeholder="Street address" id="billing_address_1" name="diachi"
                                                class="input-text" required><?= $_SESSION['diachi'] ?></textarea>
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
                                <div id="payment">
                                    <div class="form-row place-order">

                                        <input type="submit" data-value="Place order" value="update" id="place_order"
                                            name="woocommerce_checkout_place_order" class="button alt">

                                        <input type="submit" data-value="Place order" value="Change password" id="place_order"
                                            name="woocommerce_checkout_place_order" class="button alt">
                                    </div>

                                    <div class="clear"></div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>