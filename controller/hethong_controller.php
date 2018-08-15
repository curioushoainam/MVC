<?php 
class hethong_controller extends controller {

	function __construct(){
		$this->pathview = 'view/hethong/';
	}

	function home(){
		$ht_model = new hethong_model();		
		$sliders = $ht_model->dsslider();
		$brands = $ht_model->dsbrand();

		$data = array(
			'sliders'=>$sliders,
			'brands'=>$brands
		);

		$this->render('home',$data);
	}

	function contact(){
		// include 'view/hethong/contact.php';
		$this->render('contact');
	}

	function about(){
		// include 'view/hethong/contact.php';
		$this->render('about');
	}

	function _404(){
		// include 'view/hethong/404.php';	
		$this->render('404',array(),'emptylayout');
	}
}

?>