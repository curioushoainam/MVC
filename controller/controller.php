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
		include 'view/' . $layout . '.php';
	}
}

?>