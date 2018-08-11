<?php
$action = isset($_GET['action']) && $_GET['action'] ? $_GET['action'] : 'home';
$controllername = isset($_GET['controller']) && $_GET['controller'] ? $_GET['controller'].'_controller' : 'hethong_controller';
$path = 'controller/' . $controllername .'.php';
if(file_exists($path)){
	include ($path);
	$controller = new $controllername();
	// kiem tra action
	if(method_exists($controllername, $action)){
		$controller->$action();
	} else {
		include_once ('controller/hethong_controller.php');
		$controller = new hethong_controller();
		$controller->_404();
	}
} else {
	include ('controller/hethong_controller.php');
	$controller = new hethong_controller();
	$controller->_404();
}

?>
