<?php 
if ($error){    
    // chuyentrang('?controller=sanpham&action=dsSanpham');    
    chuyentrang(href('dsSanpham',array('alias'=>'dsSanpham'), $seo));    
}

if(isset($_GET['id']) && $_GET['id']){
    if(!(isset($_SESSION['topView'])))
        $_SESSION['topView'] = array();
    if(!(in_array($_GET['id'], $_SESSION['topView'])))
        array_unshift($_SESSION['topView'], $_GET['id']);
}

?>

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

<?php 
//viewArr($prod_info); exit();
$ma = isset($prod_info) && $prod_info->ma ? $prod_info->ma : NULL;
$ten = isset($prod_info) && $prod_info->ten ? $prod_info->ten : NULL;
$noi_dung_chi_tiet = isset($prod_info) && $prod_info->noi_dung_chi_tiet ? $prod_info->noi_dung_chi_tiet : NULL;
$don_gia = isset($prod_info) && $prod_info->don_gia ? $prod_info->don_gia : 0;
$don_gia_cu = isset($prod_info) && $prod_info->don_gia_cu ? $prod_info->don_gia_cu : NULL;
$danh_sach_hinh = isset($prod_info) && $prod_info->danh_sach_hinh ? $prod_info->danh_sach_hinh : NULL;
?>
<div class="single-product-area">
<div class="zigzag-bottom"></div>    
    <div class="container">      
        <div class="row">
            <!-- image -->
            <div class="col-md-10">
                <div class="col-md-5">
                    <div class="chitiet" style="position: relative"> 
                        <?php
                            if($danh_sach_hinh){
                                $dsh = explode("||", $danh_sach_hinh);
                                $count = count($dsh);
                                $ipf = 5;
                                $no = ceil($count/$ipf);
                            }
                        ?>                       
                        <img src="<?= $dsh[0] ?>" datasrc="/<?= $dsh[0] ?>" id='imglarge' height="254px"/> 

                        <div class="hinhnho product-slider">

                            <div class="clearfix">      <!-- https://codepen.io/pankajthakur/pen/qmpKaw -->
                                <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                  <div class="carousel-inner">
                                    <div class="item active">
                                    <?php
                                        $limit = $no > 1 ? $ipf : $count; 
                                        for ($i=0; $i<$limit; $i++){
                                            echo '<div data-target="#carousel" data-slide-to="'.$i.'" class="thumb"><img src="'.$dsh[$i].'" id="imgSmall'.($i+1).'" class="smallimage"/></div>';
                                        }
                                    ?>                                      
                                    </div>
                                    <?php 
                                        if($no > 1){
                                            for($j=1; $j<$no; $j++){
                                               $limit = $no > $j+1 ? $ipf*($j+1) : $count;        
                                               $frame = '<div class="item">';
                                               for ($i=5*$j; $i<$limit; $i++)
                                                    $frame .= '<div data-target="#carousel" data-slide-to="'.$i.'" class="thumb"><img src="'.$dsh[$i].'" id="imgSmall'.($i+1).'" class="smallimage"/></div>';
                                               echo $frame.' </div>';
                                            }
                                        }
                                    ?>

                                    
                                    <!-- <div class="item">
                                      <div data-target="#carousel" data-slide-to="5" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+06"></div>
                                      <div data-target="#carousel" data-slide-to="6" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+07"></div>
                                      <div data-target="#carousel" data-slide-to="7" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+08"></div>                                      
                                    </div> -->                                    

                                  </div>
                                  <!-- /carousel-inner --> 
                                  <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a> </div>
                                <!-- /thumbcarousel --> 
                                
                              </div>

                        </div>



                    </div>
                </div>  
            <!-- ======================================================= -->
                <div class="col-md-7">
                    <div class="thongtin">                        
                        <h2 style="padding-left: 0px"><?= $ten ?></h2>                        
                        <p class="price"><?= number_format($don_gia)?> VNĐ</p>                        
                        <img src="/First web project/admin/images/sales/sale_s8.jpg" />
                        <hr />
                        <!-- <h3 style="padding-left: 0px">Màu sắc</h3> -->
                        <!-- <div class="hinh_theo_mau">
                            <img src="/First web project/admin/images/sundry/Midnight-Black.jpg" onclick="changeColor('Black')" />
                            <img src="/First web project/admin/images/sundry/Arctic-Silver.jpg" onclick="changeColor('Silver')" />
                            <img src="/First web project/admin/images/sundry/Coral-Blue.jpg" onclick="changeColor('Blue')" />
                            <img src="/First web project/admin/images/sundry/Maple-Gold-.jpg" onclick="changeColor('Gold')" />
                        </div> -->
                        <div id="name">
                            <div class="col-md-6">
                                <a href="#"><img src="/First web project/admin/images/sundry/mua_tra_gop.png" width="250px" /></a>
                            </div>
                            <div class="col-md-6">
                                <a class="addtocart" data-prod_id="<?= $ma ?>" href="#"><img src="/First web project/admin/images/sundry/mua_hang.png" width="250px" /></a>
                            </div>                           
                            
                        </div>
                    </div>
                </div> 
            </div>
             <div class="col-md-2">
                 Khuyến mãi
             </div>

        </div>  
        <hr>      
        
        <!-- spec -->
        <div class="row">
            <div class="col-md-10" id="contents">
                <div>
                    <button type="button" class="btn btn-info" style="width: 100%">Thông tin sản phẩm (MSP : <?= $ma ?>)</button>
                    <div id="prodSpec" style="margin: 10px; overflow: hidden; height: 250px">
                        <?php                        
                            if($noi_dung_chi_tiet){
                                include ('./view/sanpham/spec.php');                                                            
                            }
                            
                         ?>
                    </div>
                    <div style="text-align: center; margin: 15px auto"><a href="#" data-size="0" type="button" id="xttgspec">Xem thêm</a></div>
                </div>
                <div >      <!-- style="z-index: 50; " -->
                    <button type="button" class="btn btn-info" style="width: 100%">Bài viết</button>
                    <div id="article" style="margin: 10px; overflow: hidden; height: 100px">
                        <?php                             
                            echo $bai_viet;
                         ?>
                    </div>
                    <div style="text-align: center; margin: 15px auto"><a href="#" data-size="0" type="button" id="xttg">Xem thêm</a></div>
                </div> 
                <!-- <div>
                    <button type="button" class="btn btn-info" style="width: 100%">Video</button>
                    <div id="video">
                        Thông tin tóm tắt
                    </div>
                </div>  -->
                <div style="z-index: 100;">                    
                    <button type="button" class="btn btn-info" style="width: 100%; margin-bottom: 5px">Mời bình luận và đặt câu hỏi</button> 

                    <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">
                        <form action="">
                            <div><input type="text" id="ten0" placeholder="Vui lòng nhập Họ tên của bạn" style="width: 100%; margin-bottom: 5px"></div>
                             <div><textarea id="cmcontents0" name="cmcontents" style="width: 100%; margin-bottom: 10px" rows=5></textarea></div>
                        
                        <div style="margin-top: 10px;"><button class="btn btn-info pull-right rpcm" type="button" id="cmpost" data-prod_id="<?= $_GET['id']?$_GET['id']:''; ?>" data-ma_cha="0" data-ma="0">Gửi</button></div>                                
                        </form> 
                    </div>

                    <hr>


                    <div class="col-md-10 col-md-offset-1"> 
                        <div class="card" style="margin-top: 10px">
                            <!-- <div class="card-body"> -->
                                <?php
                                    // viewArr($comment); 
                                    foreach ($comment as $cmt){
                                        $item = $cmt['content'];                                                 
                                        $ma = isset($item->ma) ? $item->ma : '';
                                        $ma_sp = isset($item->ma_sp) ? $item->ma_sp : '';
                                        $noi_dung = isset($item->noi_dung) ? $item->noi_dung : '';
                                        $ten = isset($item->ten) ? $item->ten : '';
                                        $ngay_tao = isset($item->ngay_tao) ? $item->ngay_tao : '';
                                ?>
                                    <div class="card-body">
                                        <div class="row">                                       
                                            <div class="col-md-12 ">
                                                <p><a class="float-left"><strong><?= $ten ?></strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-style: italic;"><?= $ngay_tao ?></span>                
                                                <p><?= $noi_dung ?></p>
                                                <p>
                                                    <a class="btn btn-outline-primary ml-2 reply" data-ma_cha="<?= $ma ?>" data-prod_id="<?= $ma_sp ?>" data-ma="<?= $ma ?>"><i class="fa fa-reply"></i> Reply</a>
                                               </p>
                                            </div>
                                            <div id="row<?= $ma ?>"></div>
                                        </div>
                                <?php
                                        if(isset($cmt['sub'])){
                                            foreach($cmt['sub'] as $sub){
                                                $item = $sub;
                                                // viewArr($item);                                                        
                                                $ma = isset($item->ma) ? $item->ma : '';
                                                $ma_cha = isset($item->ma_cha) ? $item->ma_cha : '';
                                                $ma_sp = isset($item->ma_sp) ? $item->ma_sp : '';
                                                $noi_dung = isset($item->noi_dung) ? $item->noi_dung : '';
                                                $ten = isset($item->ten) ? $item->ten : '';
                                                $ngay_tao = isset($item->ngay_tao) ? $item->ngay_tao : '';
                                 ?>
                                                <div class="card card-inner">
                                                    <div class="card-body">
                                                        <div class="row">                                
                                                            <div class="col-md-12">
                                                                <p><a><strong><?= $ten ?></strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-style: italic;"><?= $ngay_tao ?></span></p>

                                                                <p><?= $noi_dung ?></p>
                                                                <p>
                                                                    <a class="btn btn-outline-primary ml-2 reply" data-ma_cha="<?= $ma_cha ?>" data-prod_id="<?= $ma_sp ?>" data-ma="<?= $ma ?>"><i class="fa fa-reply"></i> Reply</a>
                                                               </p>
                                                            </div>
                                                            <div id="row<?= $ma ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php 
                                            }
                                        }                                           
                                    ?>
                                    </div>
                                    <hr>
                                <?php 
                                 }
                                ?>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-md-2" id="ads">
                Quảng cáo
            </div>

        </div>

</div>
</div>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="<?= DOMAIN ?>/system/libs/toastr.js"></script>
<script>
$(document).on("click", ".rpcm",function(){ 
    var _that = $(this);
    
    // var noidung = CKEDITOR.instances['cmcontents' + _that.data('ma')].getData();    
    var noidung = $('#cmcontents' + _that.data('ma')).val();
    // alert(noidung) ;
    var tenng = $('#ten' + _that.data('ma')).val();
    // alert(tenng) ;
    var ma_cha_ = _that.data('ma_cha');
    // alert(ma_cha_) ;
    if(!noidung || !tenng){
        toastr["warning"]("Thiếu nội dung hoặc tên người gửi","Warning");
    } else {
       $.ajax({
            url: '/MVC/controller/spAddComment.php',
            type : 'post',
            dataType : 'text',
            data :{
                prod_id: _that.data("prod_id"),            
                nd : noidung,
                ten : tenng,
                ma_cha: ma_cha_
            },
            success : function(response){
                // 0 : no error; 1: error
                data = JSON.parse(response);

                if(data.error == "0"){
                    toastr["success"]("Yêu cầu của bạn đã được gửi đi","Info");
                    $('#ten' + _that.data('ma')).val('');
                    $('#cmcontents' + _that.data('ma')).val('');
                    // CKEDITOR.instances['cmcontents'].setData('');
                }
                else 
                    toastr["warning"]("Đã có lỗi trong việc gửi đi ","Info");
            },
            error : function (err){
                if(err)
                    toastr["warning"]("Đã có lỗi trong việc gửi đi ","Info");
            }
       }); 
    }
});

$(document).on("click", ".reply",function(){
    // alert('reply');  
    var _that = $(this);
    var html = '';
    html += '<form action="">';
    html += '<input type="text" id="ten'+ _that.data("ma") +'" placeholder="Vui lòng nhập Họ tên của bạn" style="width: 100%; margin-bottom: 5px">';
    html += '<div><textarea id="cmcontents'+ _that.data("ma") +'" style="width: 100%; margin-bottom: 10px" rows=3></textarea></div>';
    
    html += '<div style="margin-top: 1px;"><button class="btn btn-info pull-right rpcm" type="button" id="reply" data-prod_id="' + _that.data("prod_id") + '" data-ma_cha="'+ _that.data("ma_cha") +'" data-ma="'+ _that.data("ma") +'">Gửi</button></div></form>';    
    _that.remove();
    // $('#id5').html(html);
    $('#row'+_that.data("ma")).html(html);

});

/*Article*/
$('#xttg').click(function(event){
    event.preventDefault();
    var _that = $(this);
    if(_that.data("size")==0){
        $('#article').css('height','auto');
        _that.html('Thu gọn');
        _that.data("size",1);
    } else {        
        $('#article').height(100);
        _that.html('Xem thêm');
        _that.data("size",0);
    }
    return false;
});

/*Specification*/
$('#xttgspec').click(function(event){
    event.preventDefault();
    var _that = $(this);
    if(_that.data("size")==0){
        $('#prodSpec').css('height','auto');
        _that.html('Thu gọn');
        _that.data("size",1);
    } else {        
        $('#prodSpec').height(250);
        _that.html('Xem thêm');
        _that.data("size",0);
    }
    return false;
});

</script>

