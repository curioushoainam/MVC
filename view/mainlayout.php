<?php 
defined('DOMAIN') or exit('Access deny');

?>
<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>First Web</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= TEMPLATE_PATH ?>/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="<?= TEMPLATE_PATH ?>/css/font-awesome.min.css"> -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= TEMPLATE_PATH ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= TEMPLATE_PATH ?>/css/style.css">
    <link rel="stylesheet" href="<?= TEMPLATE_PATH ?>/css/responsive.css">

    <link rel="stylesheet" href="<?= DOMAIN ?>/system/libs/toastr.css">    
    <link rel="stylesheet" href="<?= DOMAIN ?>/system/libs/style_self.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
   
    <!-- header top -->
    <?php include 'view/widget/header-top.php'; ?>
    <!-- header brand -->
   <?php include 'view/widget/header-brand.php'; ?>
    
    <!-- mainmenu -->
    <?php include 'view/widget/mainmenu.php'; ?>
    
    <!-- main contents // change -->
    <?php    
    include $this->pathview . $view .'.php';   

    ?>    
    
    <!-- Top footer area -->
   <?php include 'view/widget/footer-top.php'; ?>
    <!-- bottom footer area -->
   <?php include 'view/widget/footer-bottom.php'; ?>    
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="<?= TEMPLATE_PATH ?>/js/owl.carousel.min.js"></script>
    <script src="<?= TEMPLATE_PATH ?>/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="<?= TEMPLATE_PATH ?>/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="<?= TEMPLATE_PATH ?>/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="<?= TEMPLATE_PATH ?>/js/bxslider.min.js"></script>
	<script type="text/javascript" src="<?= TEMPLATE_PATH ?>/js/script.slider.js"></script>
    <script type="text/javascript" src="<?= DOMAIN ?>/system/libs/toastr.js"></script>
    <script type="text/javascript" src="<?= DOMAIN ?>/system/libs/self.js"></script>
    <script>

        // AJAX for pagination on shop page
// $(document).on("click",".page", function(event){
//     var _that = $(this);
//     alert( 'hello');
//     alert(_that.data('page'));
//     event.preventDefault(); 
//     $.ajax({
//         url: './../controller/shop_page_controller.php',
//         type : 'get',
//         dataType : 'text',
//         data :{
//             page: _that.data('page')
//         },
//         success : function(response){
//             $('#contents').html(response);
//         },
//         error : function(err){
//             $('#contents').html('<p>Trang tìm kiếm không tồn tại</p>');
//         }
//     });
//     return false; // for good measure    
// });

      
    </script>
  </body>
</html>