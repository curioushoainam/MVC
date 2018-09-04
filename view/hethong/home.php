<div class="slider-area">        
    	<!-- Slider -->
		<div class="block-slider block-slider4">
			<ul class="" id="bxslider-home4">
                <?php 
                foreach ($sliders as $item){
                    $ma = isset($item) && $item ? $item->ma_sp : '';
                    $hinh = isset($item) && $item ? $item->hinh : '';
                    $title = isset($item) && $item ? $item->title : '';
                    $prim = isset($item) && $item ? $item->prim : '';
                    $subtitle = isset($item) && $item ? $item->subtitle : '';                
                ?>
				<li>
					<img src="<?= $hinh ?>" alt="Slide">
					<div class="caption-group">
						<h2 class="caption title">
							<?= $title ?> <span class="primary"><strong><?= $prim ?></strong></span>
						</h2>
						<h4 class="caption subtitle"><?= $subtitle ?></h4>
						<a class="caption button-radius" href="?controller=sanpham&action=chitiet&id=<?= $ma ?>"><span class="icon"></span>Shop now</a>
					</div>
				</li>
                <?php 
                }
                ?>	
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
                        <?php 
                        // viewArr($newProducts);
                        foreach ($newProducts as $item){
                            $ma = isset($item->ma) ? $item->ma : '';
                            $alias = isset($item->alias) ? $item->alias : '';
                            $ten = isset($item->ten) ? $item->ten : '';
                            $hinh = isset($item->hinh) ? $item->hinh : '';                            
                            $don_gia = isset($item->don_gia) ? $item->don_gia : '0';  
                            $don_gia_cu = isset($item->don_gia_cu) ? $item->don_gia_cu : '0';  
                           
                        ?>        

                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="<?= $hinh ?>" alt="" style="height: 243px; margin-bottom: 10px">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link addtocart" data-prod_id="<?= $ma ?>"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <!-- <a href="?controller=sanpham&action=chitiet&id=<?= $ma ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a> -->
                                    <a href="<?= href('chitiet', array('alias'=>$alias,'ma'=> $ma), $seo) ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <div class="product-carousel-price">
                                <ins><?= number_format($don_gia)?>VND</ins> <del><?= number_format($don_gia_cu)?>VND</del>
                            </div> 
                            <h2><a href="<?= href('chitiet', array('alias'=>$alias,'ma'=> $ma), $seo) ?>"><?= $ten ?></a></h2>
                            <!-- <h2><a href="?controller=sanpham&action=chitiet&id=<?= $ma ?>"><?= $ten ?></a></h2> -->
                        </div>

                        <?php 
                        }
                        ?>


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
                        <?php 
                        foreach ($brands as $item){
                            $hinh = isset($item) && $item ? $item->hinh : '';
                        ?>
                        <img src="<?= $hinh ?>" alt="">
                        <?php 
                        }
                        ?>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">                    
                    <h2 class="product-wid-title">Top Sellers</h2>
                    <a href="" class="wid-view-more">View All</a>


                <?php 
                foreach($topSell as $item){
                    $ma = isset($item->ma) ? $item->ma : '';
                    $ten = isset($item->ten) ? $item->ten : '';
                    $hinh = isset($item->hinh) ? $item->hinh : '';                            
                    $don_gia = isset($item->don_gia) ? $item->don_gia : '0';  
                    $don_gia_cu = isset($item->don_gia_cu) ? $item->don_gia_cu : '0';
                ?>

                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="<?= $hinh ?>" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html"><?= $ten ?></a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins><?= number_format($don_gia) ?>VND</ins> <del><?= number_format($don_gia_cu) ?>VND</del>
                        </div>                            
                    </div>
                    
                    <?php 
                    }
                    ?>

                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Recently Viewed</h2>
                    <a href="#" class="wid-view-more">View All</a>

                    <?php                    
                    if ($topView) {
                        foreach($topView as $item){
                            $ma = isset($item->ma) ? $item->ma : '';
                            $ten = isset($item->ten) ? $item->ten : '';
                            $hinh = isset($item->hinh) ? $item->hinh : '';                            
                            $don_gia = isset($item->don_gia) ? $item->don_gia : '0';  
                            $don_gia_cu = isset($item->don_gia_cu) ? $item->don_gia_cu : '0';
                    ?>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="<?= $hinh ?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html"><?=  $ten ?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?= number_format($don_gia) ?>VND</ins> <del><?= number_format($don_gia_cu) ?>VND</del>
                            </div>                            
                        </div>
                    <?php 
                        }
                     }
                     ?>

                </div>
            </div>


            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top New</h2>
                    <a href="#" class="wid-view-more">View All</a>
                    <?php 
                        foreach ($topNew as $item){
                            $ma = isset($item->ma) ? $item->ma : '';
                            $ten = isset($item->ten) ? $item->ten : '';
                            $hinh = isset($item->hinh) ? $item->hinh : '';                            
                            $don_gia = isset($item->don_gia) ? $item->don_gia : '0';  
                            $don_gia_cu = isset($item->don_gia_cu) ? $item->don_gia_cu : '0';  
                    ?>
                    <div class="single-wid-product">
                        <a href="?controller=sanpham&action=chitiet&id=<?= $ma ?>"><img src="<?= $hinh ?>" alt="" class="product-thumb"></a>
                        <h2><a href="single-product.html"><?= $ten ?></a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins><?= number_format($don_gia) ?>VND</ins> <del><?= number_format($don_gia_cu) ?>VND</del>
                        </div>                            
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>


        </div>
    </div>
</div> <!-- End product widget area -->