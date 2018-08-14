<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?= menu_active('home')  ?>"><a href="?controller=hethong&action=home">Home</a></li>
                    <li class="<?= menu_active('dsSanpham') ?>"><a href="?controller=sanpham&action=dsSanpham">Shop page</a></li>
                    <li class="<?= menu_active('chitiet') ?>"><a href="?controller=sanpham&action=chitiet">Single product</a></li>
                    <li class="<?= menu_active('cart') ?>"><a href="?controller=donhang&action=cart">Cart</a></li>
                    <li class="<?= menu_active('checkout') ?>"><a href="?controller=donhang&action=checkout">Checkout</a></li>
                    <li class="<?= menu_active('dsCatalog') ?>"><a href="?controller=sanpham&action=dsCatalog">Category</a></li>
                    <li class="<?= menu_active('about') ?>"><a href="?controller=hethong&action=about">About us</a></li>
                    <li class="<?= menu_active('contact') ?>"><a href="?controller=hethong&action=contact">Contact</a></li>
                </ul>
            </div>  
        </div>
    </div>
</div> <!-- End mainmenu area -->