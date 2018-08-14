<?php 
class hethong_controller extends controller {

	function __construct(){
		$this->pathview = 'view/hethong/';
	}

	function home(){
		// without data
		// $this->render('home');

		// with data
		$active = 'active';
		$data = array('active'=>$active);
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