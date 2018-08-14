<?php 
class donhang_controller extends controller{
	function __construct(){
		$this->pathview = 'view/donhang/';
	}

	function cart(){		
		$this->render('cart');

	}

	function checkout(){		
		$this->render('checkout');

	}
}

?>