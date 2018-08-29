<?php 
require_once ('./../system/config/dbconfig.php');
require_once ('./../system/core/Database.php');
require_once ('./../model/sanpham_model.php');

require_once ('./../system/core/Pagination.php');
require_once ('./../model/shop_page_model.php');
include ('./../system/libs/funcs.php');

if(isset($_POST['page']) && $_POST['page'] >0){
	$sp_model = new sanpham_model();			
	$shop_page = new shop_page_model_ajax($sp_model->totalRecords());

	$listProducts = $sp_model->listProducts($shop_page->get_config('start'),$shop_page->get_config('limit'));
	// viewArr($listProducts);exit();
	$contents = '<div class="row">';
    foreach ($listProducts as $item){
        $ma = isset($item->ma) ? $item->ma : '';
        $ten = isset($item->ten) ? $item->ten : '';
        $hinh = isset($item->hinh) ? $item->hinh : '';                
        $don_gia = isset($item->don_gia) ? $item->don_gia : '0';  
        $don_gia_cu = isset($item->don_gia_cu) ? $item->don_gia_cu : '0';
    
	    $contents .= '<div class="col-md-3 col-sm-6">
	        <div class="single-shop-product">
	            <div class="product-upper text-center">
	                <img src="'.$hinh.'" alt="" style="height: 200px; width: 175px; margin-bottom: 10px">
	            </div> 

	            <div class="product-option-shop text-center">
	                <a class="add_to_cart_button addtocart" data-quantity="1" data-product_sku="" data-prod_id="'.$ma.'" rel="nofollow" href="">Add to cart</a>
	            </div> 

	            <div class="product-carousel-price text-center" style="margin: 15px auto">
	                <ins>' . number_format($don_gia) .'</ins> <del>' . ($don_gia_cu ? number_format($don_gia_cu) : "") .'</del>
	            </div> 
	            <div style="hight: 30px" class="text-center"><a href="?controller=sanpham&action=chitiet&id='. $ma .'"><span style="font-size: 1.1em">'. $ten .'</span></a></div>	            
	        </div>
	    </div>';   
    }
  
  	$contents .= '</div><div class="row"><div class="col-md-12">';
  	$contents .= $shop_page->html();
  	$contents .= '</div></div>';
  	// $contents .= '<button type="button" data-pos=0 data-limit=8 id="more">Xem thêm</button>';
  	echo $contents . '</div></div>';
        
}


if(isset($_POST['pos'], $_POST['limit']) && $_POST['limit'] >0){
	$sp_model = new sanpham_model();		
	$listProducts = $sp_model->listProducts($_POST['pos'],$_POST['limit']);

	// viewArr($listProducts);exit();
	$pos = isset($_POST['pos']) && $_POST['pos'] ? $_POST['pos'] : 0;
	$contents = '';
    foreach ($listProducts as $item){
        $ma = isset($item->ma) ? $item->ma : '';
        $ten = isset($item->ten) ? $item->ten : '';
        $hinh = isset($item->hinh) ? $item->hinh : '';                
        $don_gia = isset($item->don_gia) ? $item->don_gia : '0';  
        $don_gia_cu = isset($item->don_gia_cu) ? $item->don_gia_cu : '0';
    
	    $contents .= '<div class="col-md-3 col-sm-6 height>
	        <div class="single-shop-product">
	            <div class="product-upper text-center">
	                <img src="'.$hinh.'" alt="" style="height: 200px; width: 175px; margin-bottom: 10px">
	            </div> 

	            <div class="product-option-shop text-center">
	                <a class="add_to_cart_button addtocart" data-quantity="1" data-product_sku="" data-prod_id="'.$ma.'" rel="nofollow" href="">Add to cart</a>
	            </div> 

	            <div class="product-carousel-price text-center" style="margin: 15px auto">
	                <ins>' . number_format($don_gia) .'</ins> <del>' . ($don_gia_cu ? number_format($don_gia_cu) : "") .'</del>
	            </div> 
	            <div style="hight: 30px" class="text-center"><a href="?controller=sanpham&action=chitiet&id='. $ma .'"><span style="font-size: 1.1em">'. $ten .'</span></a></div>	            
	        </div>
	    </div>';
	    $pos ++;   
    }
  	$response = array('pos'=>$pos,'contents'=>$contents);
  	echo json_encode($response);
        
}

?>

