<?php 
class hethong_controller extends controller {

	function __construct(){
		$this->pathview = 'view/hethong/';
	}

	function home(){		
		$ht_model = new hethong_model();		
		$sliders = $ht_model->dsslider();
		$brands = $ht_model->dsbrand();
		
		$sp_model = new sanpham_model();
		$newProducts = $sp_model->newProducts(10);
		$topNew = $sp_model->newProducts(3);

		$data = array(
			'sliders'=>$sliders,
			'brands'=>$brands,
			'newProducts'=>$newProducts,
			'topNew'=>$topNew
		);

		$this->render('home',$data);
	}

	function contact(){		
		$ht_model = new hethong_model();		
		$data = array(			
			
		);
		// include 'view/hethong/contact.php';		
		$this->render('contact',$data);
	}

	function about(){
		
		$data = array(			
			
		);
		// include 'view/hethong/contact.php';
		$this->render('about',$data);
	}

	function _404(){
		// include 'view/hethong/404.php';	
		$this->render('404',array(),'emptylayout');
	}

	function login(){
		$this->render('login');
	}

	function register(){
		$this->render('register',array(),'accountlayout');
	}
}

?>