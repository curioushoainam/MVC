<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./"><img src="upload/logo.png"></a></h1>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="<?= href('cart',array('alias'=>'cart-check'), $seo) ?>"><i class="fa fa-shopping-cart"></i>&nbsp&nbsp<span id="countcart" style="color: red"><?= $countcart ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->