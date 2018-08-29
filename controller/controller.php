<?php 
class controller {
	var $pathview;

	// init without data
	// function render($view,$layout = 'mainlayout'){		
	// 	include 'view/' . $layout . '.php';
	// }

	// revise with sending data
	function render($view, $data = array(), $layout = 'mainlayout'){
		if(is_array($data)) extract($data);

		$ht_model = new hethong_model();
		$menu = $ht_model->menu();

		$dh_model = new donhang_model();
		$dh_model->setcart();
		$countcart = $dh_model->countcart();

		include 'view/' . $layout . '.php';
	}

	
}

?>