<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php foreach ($getlistPro as $r) { ?>
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img src="views/images/<?= $r[2] ?>" alt="">
                    </div>
                    <h2 style="font-size: 19px"><a href="?action=chitietsp&id=<?= $r[0] ?>"><?= $r[1] ?></a></h2>
                    <div class="product-carousel-price">
                        <?php if($r["giam_gia"] == '' || $r["giam_gia"] == 0){ ?>
                        <ins><?= $d->formatMoney($r['gia_goc'])?> VNĐ</ins>
                        <?php }else{ ?>
                        <ins><?= $d->formatMoney($r['giam_gia'])?> VNĐ</ins> <del><?= $d->formatMoney($r['gia_goc'])?> VNĐ</del>
                        <?php } ?>
                    </div>

                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70"
                            rel="nofollow" href="?action=addCart&id=<?= $r[0] ?>">Add to cart</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>