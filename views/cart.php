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
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="?action=ActionCart">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">Delete</th>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 0; foreach ($_SESSION['GH'] as $id=>$soluong) { 
                                            $getProDetail = $d->getListCart($id); 
                                            foreach($getProDetail as $r){   
                                        ?>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove"
                                                href="?action=removeCart&id=<?=$id?>">×</a>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="?action=chitietsp&id=<?=$id?>"><img width="145" height="145"
                                                    alt="poster_1_up" class="shop_thumbnail"
                                                    src="views/images/<?= $r['image'] ?>"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="?action=chitietsp&id=<?=$id?>"><?= $r['ten_sp'] ?></a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount"><?php if($r['giam_gia'] == 0 || $r['giam_gia'] == null){
                                                        echo $d->formatMoney($r['gia_goc']).' VNĐ';
                                                    }else{
                                                        echo $d->formatMoney($r['giam_gia']).' VNĐ';
                                                    } ?></span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input type="button" class="minus<?=$n?>" value="-">
                                                <input type="number" id="qty<?=$n?>" size="4" name="quantity<?=$id?>"
                                                    class="input-text qty text" title="Qty" value="<?= $soluong ?>"
                                                    min="0" step="1">
                                                <input type="button" class="plus<?=$n?>" value="+">
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">
                                                <?php if($r['giam_gia'] == 0 || $r['giam_gia'] == null){
                                                    $_SESSION['total'][$id] = $r['gia_goc'] * $soluong;
                                                }else{
                                                    $_SESSION['total'][$id] = $r['giam_gia'] * $soluong;
                                                }
                                                    echo $d->formatMoney($_SESSION['total'][$id]);
                                                ?> VNĐ
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $n++; };
                                    } ?>
                                    <input type="hidden" id="id" value="<?= count($_SESSION['GH']) ?>">
                                    <script>
                                    var n = document.querySelector('#id').value;
                                    var soluong = new Array();
                                    var minus = new Array();
                                    var plus = new Array();
                                    for (let i = 0; i < n; i++) {
                                        minus.push(document.querySelector('.minus' + i));
                                        plus.push(document.querySelector('.plus' + i));
                                        soluong.push(document.querySelector('#qty' + i).value);
                                        minus[i].onclick = (e) => {
                                            if (soluong[i] == 0) {
                                                return false;
                                            }
                                            soluong[i] = Number(soluong[i]) - 1;
                                            document.getElementById('qty' + i).value = soluong[i];
                                        };
                                        plus[i].onclick = (e) => {
                                            soluong[i] = Number(soluong[i]) + 1;
                                            document.getElementById('qty' + i).value = soluong[i];
                                        };
                                    }
                                    </script>
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <div class="coupon">
                                                <label for="coupon_code">Coupon:</label>
                                                <input type="text" class="input-text" name="coupon_code"
                                                    value="<?php if(isset($_SESSION['Cart']['tonggia'])){echo $_SESSION['Cart']['coucode'];} ?>"
                                                    id="coupon_code" aria-describedby="helpId" placeholder="Coupon code"
                                                    <?php if(isset($_SESSION['Cart']['tonggia'])){echo 'disabled';} ?>>
                                                <?php if(isset($_SESSION['Cart']['tonggia'])){
                                                    echo '<button type="submit" name="cancel_coupon"
                                                    class="btn btn-danger btn-lg" style="background-color:#dc3545" >cancel coupon</button>';
                                                } else {
                                                    echo '<button type="submit" name="apply_coupon"
                                                    class="btn btn-primary btn-lg" >Apply Coupon</button>';
                                                }
                                                ?>
                                                <?php if(isset($_SESSION['Cart']['thongbao'])){
                                                    echo '<span class="badge" '. $d->CssMess() .'>'.$_SESSION['Cart']['thongbao'].'</span >';
                                                    unset($_SESSION['Cart']['thongbao']);
                                                    } 
                                                ?>
                                            </div>
                                            <button type="submit" name="update_cart"
                                                class="btn btn-primary btn-lg">Update Cart</button>
                                            <button type="submit" name="checkout_cart" class="btn btn-primary btn-lg"
                                                <?php if($tongtien == 0) echo 'disabled' ?>>Check out</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>You may be interested in...</h2>
                                <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front"
                                                class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku=""
                                            data-product_id="22" rel="nofollow" href="single-product.html">Select
                                            options</a>
                                    </li>
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front"
                                                class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku=""
                                            data-product_id="22" rel="nofollow" href="single-product.html">Select
                                            options</a>
                                    </li>
                                </ul>
                            </div>


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount"><?= $tongtien ?> VNĐ</span></td>
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
                                            <td><strong><span class="amount">
                                                        <?php   if(isset($_SESSION['Cart']['tonggia'])){
                                                            echo $d->formatMoney($_SESSION['Cart']['tonggia']).' VNĐ';
                                                        }else{
                                                            echo $tongtien.' VNĐ';
                                                        }?>
                                                    </span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>