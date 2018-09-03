<!-- Go to top -->
<div>
    <button type="button" class="btn btn-info" id="gototop" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i>
    </button>
</div>

<?php
 // viewArr(json_decode($footer1,512)); 
 // viewArr(json_decode($footer2,512)); 
 // viewArr(json_decode($footer3,512)); 
 // viewArr(json_decode($footer4,512));
 ?>

<!-- footer top area -->
<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <?php
                        $footer1 = json_decode($footer1,512);
                        $footer11 = isset($footer1['coName']) ? $footer1['coName'] : '';
                        $footer12 = isset($footer1['coInfo']) ? $footer1['coInfo'] : '';
                        $footer13 = isset($footer1['fblink']) ? $footer1['fblink'] : '';
                        $footer14 = isset($footer1['twtlink']) ? $footer1['twtlink'] : '';
                        $footer15 = isset($footer1['ytlink']) ? $footer1['ytlink'] : '';
                        $footer16 = isset($footer1['inlink']) ? $footer1['inlink'] : '';                           
                    ?>

                    <h2><span><?= $footer11 ?></span></h2>
                    <p><?= $footer12 ?></p>
                    <div class="footer-social">
                        <a href="<?= $footer13 ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="<?= $footer14 ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="<?= $footer15 ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="<?= $footer16 ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>


                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <!-- <h2 class="footer-wid-title">User Navigation </h2>
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Order history</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Vendor contact</a></li>
                        <li><a href="#">Front page</a></li>
                    </ul> -->                        
                    <?php
                        $footer2 = json_decode($footer2,512);
                        echo htmlspecialchars_decode($footer2['naviHtml']);
                    ?>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <!-- <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                        <li><a href="#">Mobile Phone</a></li>
                        <li><a href="#">Home accesseries</a></li>
                        <li><a href="#">LED TV</a></li>
                        <li><a href="#">Computer</a></li>
                        <li><a href="#">Gadets</a></li>
                    </ul>  --> 
                    <?php
                        $footer3 = json_decode($footer3,512);
                        echo htmlspecialchars_decode($footer3['catalog']);
                    ?>                      
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <!-- <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" id="subscribeEmail" placeholder="Type your email">
                            <button type="button" class="btn btn-info" id="btn_subscribe" >Subscribe</button>
                        </form>
                    </div> -->
                    <?php
                        $footer4 = json_decode($footer4,512);
                        echo htmlspecialchars_decode($footer4['newsletter']);
                    ?> 
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->


<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

$(document).on('click','#btn_subscribe', function(){
    // alert($('#subscribeEmail').val());
  if($('#subscribeEmail').val()){
    $.ajax({
        url : './controller/addSubcribe.php',
        dataType: 'text',
        type: 'post',
        data : {
          email : $('#subscribeEmail').val()
        },
        success : function(res){
          data = JSON.parse(res);
          if(data.state == 'ok'){
            $('#btn_subscribe').val('');
            toastr["success"]("Bạn đã subcribe thành công","info");       
          } else {
            toastr["warning"]("Bạn đã subcribe thất bại","warning");
          }     
        },
        error : function(err){
          toastr["warning"]("Lỗi server, xin vui lòng thử lại","warning");
        }     
      });
  }  
  
});

</script>