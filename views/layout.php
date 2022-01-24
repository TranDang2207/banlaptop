<div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
                    <?php foreach ($slide as $r) {?>
                        <li>
                            <img src="views/images/<?= $r['image']?>" style="width: 500px; margin-left: 8%;" alt="Slide">
                            <div class="caption-group">
                                <h2 class="caption title">
                                    <?= $r['ten_loailaptop'] ?> <span class="primary"><?= $r['ten_loai']?></span>
                                </h2>
                                <a class="caption button-radius" href="?action=chitietsp&id=<?= $r["id_sp"] ?>"><span class="icon"></span>View now</a>
                            </div>
                        </li>
                    <?php } ?>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            <?php foreach ($t as $row){ ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="views/images/<?= $row["image"] ?>" alt="">
                                        <div class="product-hover">
                                            <a href="?action=addCart&id=<?= $row[0] ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="?action=chitietsp&id=<?= $row[0] ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>
                                    
                                    <h2><a href="?action=chitietsp&id=<?= $row[0] ?>"><?= $row["ten_sp"] ?></a></h2>
                                    
                                    <div class="product-carousel-price">
                                        <?php if($row["giam_gia"] == '' || $row["giam_gia"] == 0){ ?>
                                                <ins><?= $d->formatMoney($row['gia_goc'])?> VNĐ</ins>
                                        <?php }else{ ?>
                                                <ins><?= $d->formatMoney($row['giam_gia'])?> VNĐ</ins> <del><?= $d->formatMoney($row['gia_goc'])?></del>
                                        <?php } ?>
                                    </div> 
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <?php for($i = 0; $i <= 6; $i++){ ?>
                                <img src="views/images/OIP<?= $i + 1 ?>.jpg" style="width: 200px" alt="">    
                            <?php } ?>                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->