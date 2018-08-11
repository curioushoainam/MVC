<?php 
class hethong_controller{
	function home(){
		include 'view/hethong/home.php';
	}
	function lienhe(){
		include 'view/hethong/contact.php';
	}
	function _404(){
		include 'view/hethong/404.php';	
	}
}

?>