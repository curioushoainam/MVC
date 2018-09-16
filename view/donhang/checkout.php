<?php 
if(!(isset($_SESSION['user_login'], $_SESSION['user']) && $_SESSION['user_login'] && $_SESSION['user']))
    // chuyentrang('?controller=hethong&action=login');
    chuyentrang(href('login',array('alias'=>'login'), $seo));
?>


<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Check out</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="container-fluid checkout">
                  <div class="page-header">
                    <h1>Checkout <small>  (bước 2/3)</small></h1>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="well">
                        &hellip;
                      </div>
                      <div class="checkbox">
                        <label data-toggle="collapse" data-target="#promo">
                          <input type="checkbox" id="pccheck"> Tôi có mã khuyến mãi (promo code) : 
                        </label>&nbsp<span id="procoddisplay"><?= isset($_SESSION['order']['promocode'])?$_SESSION['order']['promocode']:''; ?></span>
                      </div>
                      <div class="collapse" id="promo">
                        <div class="form-group">
                          <label for="inputpromo" class="control-label">Promo Code</label>
                          <div class="form-inline">
                            <input type="text" class="form-control" id="promocode" placeholder="Enter promo code">
                            <button type="button" class="btn btn-sm" id="btn_promocode">Apply</button>
                          </div>
                        </div>
                      </div>
                  
                  <form action="" method="post">
                      <div class="row">
                        <div class="col-sm-6">
                            <h3>Nơi nhận hàng&hellip;</h3>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-info pull-right" id="btn_address">Apply</button>
                        </div>
                      </div>
                      <div id="addrchosed" class="text-center text-success"><?= isset($_SESSION['order']['ho_ten'],$_SESSION['order']['dia_chi'],$_SESSION['order']['phone'])?$_SESSION['order']['ho_ten'].' || '.$_SESSION['order']['dia_chi'].' || '.$_SESSION['order']['phone']:'' ?>
                      </div>                                            
                      <div class="list-group">
                
                      <div class="list-group-item">                          
                        <div class="list-group-item-heading">          
                            <div class="row">
                              <div class="col-xs-3">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="address" value="curradd" checked>
                                     Địa chỉ hiện tại
                                  </label>
                                </div>
                              </div>
                              <div class="col-xs-9">                      
                                <!-- <form role="form" class=""> -->
                                  <div class="form-group">
                                    <label for="inputname">Họ tên</label>
                                    <input type="text" class="form-control form-control-large" id="currho_ten" value="<?= $ho_ten ?>" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputAddress1">Địa chỉ</label>
                                    <input type="text" class="form-control form-control-large" id="currdia_chi" value="<?= $dia_chi ?>" readonly>
                                  </div>

                                  <div class="form-group">
                                    <label for="inputAddress1">Số điện thoại</label>
                                    <input type="text" class="form-control form-control-large" id="currphone" value="<?= $sdt ?>" readonly>
                                  </div> 
                                <!-- </form> -->
                                <!-- <button class="btn btn-sm">Save Address</button> -->
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="list-group-item">                          
                          <div class="list-group-item-heading">          
                              <div class="row">
                                <div class="col-xs-3">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="address" value="newadd">
                                      Địa chỉ mới
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xs-9">                      
                                  <!-- <form role="form" class=""> -->
                                    <div class="form-group">
                                      <label for="inputname">Họ tên</label>
                                      <input type="text" class="form-control form-control-large" id="newho_ten" placeholder="Enter name" >
                                    </div>
                                    <div class="form-group">
                                      <label for="inputAddress1">Địa chỉ</label>
                                      <input type="text" class="form-control form-control-large" id="newdia_chi" placeholder="số nhà - xã/phường/tt - quận/huyện - tỉnh/tp" >
                                    </div>

                                    <div class="form-group">
                                      <label for="inputAddress1">Số điện thoại</label>
                                      <input type="text" class="form-control form-control-large" id="newphone" placeholder="số điện thoại 10 - 11 chữ số" >
                                    </div> 
                                  <!-- </form> -->
                                  <!-- <button class="btn btn-sm">Save Address</button> -->
                                </div>
                              </div>
                          </div>
                        </div>

                      </div>
                  <!-- <form role="form" method="post" action=""> -->
                      <div>
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#gift">
                              <input type="checkbox" id="gmcheckbox" value="true"> Tôi muốn đính kèm theo thông điệp
                            </label>&nbsp : &nbsp&nbsp<span id="giftmsgdpl"><?= isset($_SESSION['order']['giftmsg'])?$_SESSION['order']['giftmsg']:''; ?></span>
                          </div>
                          <div class="form-group collapse" id="gift">
                            <label for="inputGift" class="control-label">Thông điệp</label>
                            <textarea class="form-control form-control-large" rows="3"  id="giftmsgctt"><?= isset($_SESSION['giftmsg'])?$_SESSION['giftmsg']:'' ?></textarea>
                            <p class="help-block">Không quá 256 ký tự</p>
                            <button type="button" class="btn btn-sm" id="giftmsg">Apply</button>
                          </div>

                      </div>
                      
                      <div class="row">
                        <div class="col-sm-6">
                            <h3>Thanh toán&hellip;</h3>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-info pull-right" id="btn_pay">Apply</button>
                        </div>
                      </div>
                      <div id="paychosed" class="text-center text-success"><?= isset($_SESSION['order']['pay'])?$_SESSION['order']['pay']:'' ?>
                      </div>
                        <div class="list-group-item">
                          <div class="list-group-item-heading">          
                              <div class="row radio">
                                <div class="col-xs-3">
                                  <label data-toggl-e="collapse" data-target="#newcard">
                                    <input type="radio" name="paying" id="bycash" value="Thanh toán trực tiếp" checked>
                                    Trực tiếp
                                  </label>
                                </div>
                                <div class="col-xs-9">                      
                                  <div class="media">                                    
                                    <div class="media-body" id="cash">
                                      Thanh toán trực tiếp với nhân viên giao hàng khi nhận hàng
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="list-group-item-heading">          
                              <div class="row radio">
                                <div class="col-xs-3">
                                  <label data-toggl-e="collapse" data-target="#newcard">
                                    <input type="radio" name="paying" id="bycreditcard" value="Credit Card">
                                    Credit Card
                                  </label>
                                </div>
                                <div class="col-xs-9">                      
                                  <div class="media">
                                    <a class="media-left" href="#">
                                      <img src="https://lovewithfood.com/assets/credit_cards/cards-b3a7c7b8345355bf110ebedfd6401312.png" height="25" alt="" />
                                    </a>
                                    <div class="media-body" id="newcard">
                                      Những thẻ ghi nợ được được chấp nhận.
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="list-group-item-heading">          
                              <div class="row radio">
                                <div class="col-xs-3">
                                  <label>
                                    <input type="radio" name="paying" id="bypaypal" value="paypal">
                                    PayPal
                                  </label>
                                </div>
                                <div class="col-xs-9">                      
                                  <div class="media">
                                    <a class="media-left" href="#">
                                      <img src="" height="25" alt="" />
                                    </a>
                                    <div class="media-body">
                                      Khi bạn click "Đặt hàng", bạn sẽ tới website PayPal.
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="well">
                        <!-- <button type="button" class="btn btn-primary btn-lg btn-block" id="placeorder" name="placeorder" >Xem trước</button> -->
                        <div><a type="button" class="btn btn-primary btn-lg" style="width: 100%" href="<?= href('preview', array('alias'=>'preview'), $seo) ?>">Xem trước</a></div>
                        <!-- <div><a type="button" class="btn btn-primary btn-lg" style="width: 100%" href="?controller=donhang&action=preview">Xem trước</a></div> -->
                      </div>
                    </div>
                  </div>
                </form>

            </div>  
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

$(document).on('click','#btn_promocode', function(){
  if($('#pccheck').val() && $('#promocode').val())  
    var promocode = $('#promocode').val();
  // alert(prod_id)

  $.ajax({
    url : './controller/processCheckout.php',
    dataType: 'text',
    type: 'post',
    data : {
      promocode : promocode
    },
    success : function(res){
      data = JSON.parse(res);
      if(data.state == 'ok'){
        $('#procoddisplay').html(promocode);
        toastr["success"]("Promo code cập nhật thành công","info");       
      } else {
        toastr["warning"]("Promo code cập nhật thất bại","warning");
      }     
    },
    error : function(err){
      toastr["warning"]("Lỗi server","warning");
    }     
  });
});

$(document).on('click','#giftmsg', function(){
  if($('#gmcheckbox').val() && $('#giftmsgctt').val())  
    var giftmsgctt = $('#giftmsgctt').val();
  // alert(prod_id)

  $.ajax({
    url : './controller/processCheckout.php',
    dataType: 'text',
    type: 'post',
    data : {
      giftmsg : giftmsgctt
    },
    success : function(res){
      data = JSON.parse(res);
      if(data.state == 'ok'){
        $('#giftmsgdpl').html(giftmsgctt);
        toastr["success"]("Thông điệp cập nhật thành công","info");       
      } else {
        toastr["warning"]("Thông điệp cập nhật thất bại","warning");
      }     
    },
    error : function(err){
      toastr["warning"]("Lỗi server","warning");
    }     
  });
});

$(document).on('click','#btn_address', function(){  
  var addr = $('input:radio[name=address]:checked').val(); 
  // alert(addr);
  if(addr == 'curradd'){
    var ho_ten = $('#currho_ten').val();
    var dia_chi = $('#currdia_chi').val();
    var phone = $('#currphone').val();
  }

  if(addr == 'newadd'){
    var ho_ten = $('#newho_ten').val();
    var dia_chi = $('#newdia_chi').val();
    var phone = $('#newphone').val();
  }

  $.ajax({
    url : './controller/processCheckout.php',
    dataType: 'text',
    type: 'post',
    data : {
        ho_ten : ho_ten,
        dia_chi : dia_chi,
        phone : phone
    },
    success : function(res){
      data = JSON.parse(res);
      if(data.state == 'ok'){
        $('#addrchosed').html(ho_ten+' || '+dia_chi+' || '+phone);
        toastr["success"]("Nơi nhận hàng cập nhật thành công","info");       
      } else {
        toastr["warning"]("Nơi nhận hàng cập nhật thất bại","warning");
      }     
    },
    error : function(err){
      toastr["warning"]("Lỗi server","warning");
    }     
  });
});

$(document).on('click','#btn_pay', function(){

  var pay = $('input:radio[name=paying]:checked').val();

  $.ajax({
    url : './controller/processCheckout.php',
    dataType: 'text',
    type: 'post',
    data : {
      pay : pay
    },
    success : function(res){
      data = JSON.parse(res);
      if(data.state == 'ok'){
        $('#paychosed').html(pay);
        toastr["success"]("Thanh toán cập nhật thành công","info");       
      } else {
        toastr["warning"]("Thanh toán cập nhật thất bại","warning");
      }     
    },
    error : function(err){
      toastr["warning"]("Lỗi server","warning");
    }     
  });
});

</script>