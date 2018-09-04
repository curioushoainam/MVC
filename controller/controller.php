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
		$menu = json_encode($menu);
		$menu = json_decode($menu, 512);
		$seo = $ht_model->seo();

		$footer1 = $ht_model->footer1();
		$footer2 = $ht_model->footer2();
		$footer3 = $ht_model->footer3();
		$footer4 = $ht_model->footer4();

		$dh_model = new donhang_model();
		$dh_model->setcart();
		$countcart = $dh_model->countcart();

		include 'view/' . $layout . '.php';
	}

	
}

?>