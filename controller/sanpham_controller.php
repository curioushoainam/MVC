<?php 
class sanpham_controller extends controller {

	function __construct(){
		$this->pathview = 'view/sanpham/';
	}

	function dsSanpham(){
		//include 'view/sanpham/productlist.php';
		$this->render('dsSanpham');
	}

	function chitiet(){
		// include 'view/sanpham/chitiet.php';
		$this->render('chitiet');

	}
	
}

?>