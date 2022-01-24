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
                                        <ins><?= $d->formatMoney($r['giam_gia'])?> VNĐ</ins> <del><?= $d->formatMoney($r['gia_goc'])?> VNĐ</del>
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
                        <div class="product-breadcroumb">
                            <a href="./">Home</a>
                            <a href="?action=DetailCate&id=<?= $getProDetail['id_loai'] ?>"><?= $getProDetail['ten_loai'] ?></a>
                            <a href=""><?= $getProDetail['ten_sp'] ?></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="views/images/<?= $getProDetail['image'] ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?= $getProDetail['ten_sp'] ?></h2>
                                    <div class="product-inner-price">
                                        <?php if($getProDetail["giam_gia"] == '' || $getProDetail["giam_gia"] == 0){ ?>
                                            <ins><?= $d->formatMoney($getProDetail['gia_goc'])?> VNĐ</ins>
                                        <?php }else{ ?>
                                            <ins><?= $d->formatMoney($getProDetail['giam_gia'])?> VNĐ</ins> <del><?= $d->formatMoney($getProDetail['gia_goc'])?> VNĐ</del>
                                        <?php } ?>
                                    </div>    
                                    
                                    <form action="?action=addCart" class="cart" method="post">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                            <input type="hidden" name="id" value=<?= $getProDetail['id_sp'] ?>>
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="?action=DetailCate&id=<?= $getProDetail['id_loai'] ?>"><?= $getProDetail['ten_loai'] ?></a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div role="tabpanel">
                                <ul class="product-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <?= $getProDetail['mota'] ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                        <h2>Reviews</h2>
                                        <div class="submit-review">
                                            <p><label for="name">Name</label> <input name="name" type="text"></p>
                                            <p><label for="email">Email</label> <input name="email" type="email"></p>
                                            <div class="rating-chooser">
                                                <p>Your rating</p>

                                                <div class="rating-wrap-post">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                            <p><input type="submit" value="Submit"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                <?php foreach ($getProsRecent2 as $row) { ?>
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
                                                    <ins><?= $d->formatMoney($row['giam_gia'])?> VNĐ</ins> <del><?= $d->formatMoney($row['gia_goc'])?> VNĐ</del>
                                            <?php } ?>
                                        </div> 
                                    </div>
                                <?php } ?>                               
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>