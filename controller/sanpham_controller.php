<?php 
class sanpham_controller extends controller {

	function __construct(){
		$this->pathview = 'view/sanpham/';
	}

	function dsSanpham(){		
		$sp_model = new sanpham_model();			
		$shop_page = new shop_page_model($sp_model->totalRecords());	

		$pages = $shop_page->html();
		// Phân trang theo URL
		// $listProducts = $sp_model->listProducts($shop_page->get_config('start'),$shop_page->get_config('limit'));

		// Phân trang theo ajax
		$listProducts = $sp_model->listProducts(0,$shop_page->get_config('limit'));
		
		$data = array(			
			'listProducts'=>$listProducts,
			'pages'=>$pages
		);
		//include 'view/sanpham/productlist.php';
		$this->render('dsSanpham',$data);
	}

	function chitiet(){
		$sp_model = new sanpham_model();		
		
		$error = true;
		$prod_info = NULL;
		$bai_viet = 'Bài viết đang được cập nhật';
		$comment = array();
		if(isset($_GET['id'],$_GET['alias']) && $_GET['id'] && $_GET['alias']){	
			$error = false;						
			$prod_info = $sp_model->prodDetail($_GET['id'],$_GET['alias']);			

			$article = $sp_model->prodArticle($_GET['id']);
			if($article)
				$bai_viet = $article->chi_tiet;

			$comment = loadcomment($_GET['id']);			
		}

		$data = array(			
			'prod_info'=>$prod_info,
			'bai_viet'=>$bai_viet,
			'comment'=>$comment,
			'error' =>$error
		);
		// include 'view/sanpham/chitiet.php';
		$this->render('chitiet',$data);

	}
	
}


function loadcomment($prod_id, $ma_cha=0, $isSub=FALSE){
	$sp_model = new sanpham_model();
	// $attr = isSub ? 'card-inner' : '';

	$res = array();
	// load comment with $ma_cha=0
	$cmns = $sp_model->readComment($prod_id, $ma_cha);
	foreach ($cmns as $cmn){
		$ma = $cmn->ma;
		$cmncs = $sp_model->readComment($prod_id, $ma);
		if(isset($cmncs) && $cmncs)
			array_push($res, array(									
									'content' =>$cmn,
									'sub'=>$cmncs
								));
		else
			array_push($res, array('content' =>$cmn));
	}
	return $res;
}

?>