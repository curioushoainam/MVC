<?php 
if(!(isset($_SESSION['user_login'], $_SESSION['user']) && $_SESSION['user_login'] && $_SESSION['user']))
    // chuyentrang('?controller=hethong&action=login');
    chuyentrang('login');

if(!(isset($cart) && $cart))
    // chuyentrang('?controller=donhang&action=cart');
    chuyentrang('cart-check');

if(!(isset($order['ho_ten'], $order['dia_chi'], $order['phone'], $order['pay']) && $order['ho_ten'] && $order['dia_chi'] && $order['phone'] && $order['pay'])){
    // chuyentrang('?controller=donhang&action=checkout');
    chuyentrang('checkout');
}

?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Preview</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
if(isset($_SESSION['errmsg']) && $_SESSION['errmsg']){
    echo '<div class="text-center" style="color: red"><i>'.$_SESSION['errmsg'].'</i></div>';
    unset($_SESSION['errmsg']);
}
?>
<?php

$ho_ten = isset($order['ho_ten']) ? $order['ho_ten'] : '';
$dia_chi = isset($order['dia_chi']) ? $order['dia_chi'] : '';
$phone = isset($order['phone']) ? $order['phone'] : '';
$pay = isset($order['pay']) ? $order['pay'] : '';
$giftmsg = isset($order['giftmsg']) ? $order['giftmsg'] : '';
$promocode = isset($order['promocode']) ? $order['promocode'] : '';

?>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
        <div class="container">
            
            <section class="content content_content">
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> HNHD Co.
                                    <small class="pull-right"><?= date('d-m-Y H:i:s') ?></small>
                                </h2>
                            </div><!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-md-4 invoice-col">
                                <!-- From
                                <address>
                                    <strong>
                                    </strong>
                                </address> -->
                            </div><!-- /.col -->
                            <div class="col-md-4 invoice-col">
                                To
                                <address>
                                    <strong><?= $ho_ten ?></strong>
                                    <br>Address:
                                    <?= $dia_chi ?>
                                    <br>Phone:
                                    <?= $phone ?>
                                    <br>Phương thức thanh toán:
                                    <?= $pay ?>                                    
                                    <br>Thông điệp đính kèm:
                                    <?= $giftmsg ?>
                                    <br>Mã khuyến mãi:
                                    <?= $promocode ?>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-md-4 invoice-col">
                                <!-- <b>Invoice #_ _ _ _</b><br>
                                <br><b>Order ID:</b> _ _ _ _
                                <br><b>Payment Due:</b> _ _ _ _ -->
                                <br><b>Account:</b> <?= $account ?>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">



                                <table id="cart" class="table table-responsive table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th style="width:50%">Product</th>
                                            <th style="width:9%" >Prod_id</th>
                                            <th style="width:10%" >Price</th>
                                            <th style="width:9%" >Quantity</th>
                                            <th style="width:22%" >Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $ma=$ten=$hinh=NULL; $dongia=$soluong=$subtotal=$total=0;
                                        // foreach($cart as $item){
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
                                                        <div class="col-sm-10">
                                                            <p class="nomargin"><strong><?= $ten ?></strong></p>
                                                            <p><?= $ten ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="prod_id" ><?= $ma ?></td>
                                                <td data-th="Price" ><?= number_format($dongia) ?></td>
                                                <td data-th="Quantity" ><?= $soluong ?></td>
                                                <td data-th="Subtotal"  id="subtotal<?= $ma ?>"><?= number_format($subtotal) ?></td>           
                                            </tr>
                                        <?php 
                                        }
                                        ?>                    
                                    </tbody>
                                    <tfoot>
                                        <tr class="visible-xs">
                                            <td class=""><strong>Total &nbsp : &nbsp <span id="total1"><?= number_format($total) ?></span> VND</strong></td>
                                        </tr>
                                        <tr>                                            
                                            <td colspan="3" class="hidden-xs"></td>
                                            <td class="hidden-xs text-right"><strong>Total &nbsp : &nbsp</strong></td>
                                            <td class="hidden-xs "><strong><span name="total2"><?= number_format($total) ?></span> VND</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                  
                              

                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="<?= href('cart', array('alias'=>'cart-check'), $seo) ?>" class="btn btn-info"><i class="fa fa-shopping-cart"></i> Cart</a>
                                <a href="<?= href('checkout', array('alias'=>'checkout'), $seo) ?>" class="btn btn-info"><i class="fa fa-money"></i> Checkout</a>
                                <!-- <button type="button" class="btn btn-success pull-right" id="placeorder" value="<?= $total ?>"><i class="fa fa-credit-card"></i> Đặt hàng</button> -->
                                <form action="./controller/placeOrder.php" method="post">
                                    <button type="submit" class="btn btn-success pull-right" name="placeorder" value="<?= $total?>"><i class="fa fa-credit-card"></i> Đặt hàng</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </section>
                
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

$(document).on('click','#placeorder', function(){
  if($('#placeorder').val()){
        var total = $('#placeorder').val(); 

        $.ajax({
            url : './controller/placeOrder1.php',
            dataType: 'text',
            type: 'post',
            data : {
              total : total
            },
            success : function(res){
              data = JSON.parse(res);
              if(data.state == 'ok'){
                toastr["success"]("Đặt hàng thành công","Info");
                // confirm("Đặt hàng thành công");
                resflag = true;
              } else {
                toastr["warning"]("Đặt hàng thất bại","warning");
                resflag = false;
              }     
            },
            error : function(err){
              toastr["warning"]("Lỗi server","warning");
              resflag = false; 
              return resflag;              
            }     
        });   
        if(!resflag){
            alert('success');
            var origin = window.location.origin;
            alert(origin);
            // window.location.href(origin + "?controller=donhang&action=invoice");             
        }
  }
  
});

</script>