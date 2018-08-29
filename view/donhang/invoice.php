<?php 
if(!(isset($_SESSION['login'], $_SESSION['account']) && $_SESSION['login'] && $_SESSION['account']))
    chuyentrang('?controller=hethong&action=login');

if(!(isset($_GET['orderID']) && $_GET['orderID']))
    chuyentrang('?controller=sanpham&action=dsSanpham');

if(!(isset($cart, $orderInfo) && $cart && $orderInfo))
    chuyentrang('?controller=sanpham&action=dsSanpham');
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Invoice</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 

// viewArr($orderInfo);
// viewArr($cart);
// viewArr($amount);

$ho_ten = isset($orderInfo['ho_ten']) ? $orderInfo['ho_ten'] : '';
$dia_chi = isset($orderInfo['dia_chi']) ? $orderInfo['dia_chi'] : '';
$phone = isset($orderInfo['phone']) ? $orderInfo['phone'] : '';
$pay = isset($orderInfo['pay']) ? $orderInfo['pay'] : '';
$giftmsg = isset($orderInfo['giftmsg']) ? $orderInfo['giftmsg'] : '---';
$promocode = isset($orderInfo['promocode']) ? $orderInfo['promocode'] : '---';


$ma_ = isset($invoice->ma) ? $invoice->ma : '';
$account_ = isset($account) ? $account : '';
$orderID_ = isset($orderID) ? $orderID : '';
$paymentDue_ = isset($paymentDue) ? $paymentDue : '';
$createdDate_ = isset($createdDate) ? $createdDate : '';

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
                                    <small class="pull-right"><?=$createdDate_ ?></small>
                                </h2>
                            </div><!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>
                                        HNHD Co.</strong>
                                    <br>
                                    Address:
                                    VietNam - the Earth - the Sun System<br>
                                    Phone:
                                    12345678900<br>
                                    Email:hnnd@tetss.com</address>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
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
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #<?= $ma_ ?></b><br>
                                <br>
                                <b>Order ID:</b> <?= $orderID_ ?><br>
                                <b>Payment Due:</b> <?= $paymentDue_ ?><br>
                                <b>Account:</b> <?= $account_ ?>
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
                                        $ma=$ten=$hinh=NULL; $dongia=$soluong=$subtotal=0;
                                        // foreach($cart as $item){
                                        foreach($cart as $item){
                                            $ma = $item['ma'] ? $item['ma'] : '';
                                            $ten = $item['ten'] ? $item['ten'] : '';
                                            $hinh = $item['hinh'] ? $item['hinh'] : '';
                                            $dongia = $item['dongia'] ? $item['dongia'] : 0;
                                            $soluong = $item['soluong'] ? $item['soluong'] : 0;
                                            $subtotal = $dongia * $soluong;
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
                                        <?php $total = isset($amount) ? $amount : '0'; ?>
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
                            <div class="col-xs-12 text-center">
                                <!-- <a href="" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
                                <!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Xác nhận</button> -->
                                <button class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                            </div>
                        </div>
                    </section>
                </section>
        </div>
    </div>
</div>