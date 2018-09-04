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
            <table id="cart" class="table table-responsive table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:4%" class="text-center">Prod_id</th>
                        <th style="width:10%" class="text-center">Price</th>
                        <th style="width:4%" class="text-center">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%" class="text-center">Todo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $ma=$ten=$hinh=NULL; $dongia=$soluong=$subtotal=$total=0;
                    foreach($cart as $item){
                        $ma = $item['ma'] ? $item['ma'] : '';
                        $ten = $item['ten'] ? $item['ten'] : '';
                        $hinh = $item['hinh'] ? $item['hinh'] : '';
                        $dongia = $item['dongia'] ? $item['dongia'] : 0;
                        $soluong = $item['soluong'] ? $item['soluong'] : 0;
                        $subtotal = $dongia * $soluong;
                        $total += $subtotal;                    
                    ?>
                        <tr  id="row<?=  $ma ?>">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="<?= $hinh ?>" alt="..." class="img-responsive"/></div>
                                    <div class="col-sm-10">
                                        <p class="nomargin"><strong><?= $ten ?></strong></p>
                                        <p><?= $ten ?></p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="prod_id"  class="text-center"><?= $ma ?></td>
                            <td data-th="Price" class="text-center"><?= number_format($dongia) ?></td>
                            <td >
                                <input type="number" class="form-control text-center qty" value="<?= $soluong ?>" data-prod_id="<?= $ma ?>">
                            </td>
                            <td data-th="Subtotal" class="text-center" id="subtotal<?= $ma ?>"><?= number_format($subtotal) ?></td>
                            <td class="actions text-center" data-th="">                                
                                <button class="btn btn-danger btn-sm btn_delitem" data-prod_id="<?= $ma ?>"><i class="fa fa-trash-o"></i></button>                                
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>                    
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total &nbsp : &nbsp <span id="total1"><?= number_format($total) ?></span> VND</strong></td>
                    </tr>
                    <tr>
                        <td><a href="<?= href('dsSanpham', array('alias'=>'shop-page'), $seo) ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <!-- <td><a href="?controller=sanpham&action=dsSanpham" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td> -->
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total &nbsp : &nbsp</strong></td>
                        <td class="hidden-xs text-center"><strong><span id="total2"><?= number_format($total) ?></span> VND</strong></td>
                        <!-- <td><a href="?controller=donhang&action=checkout" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td> -->
                        <td><a href="<?= href('checkout', array('alias'=>'checkout'), $seo) ?>" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
