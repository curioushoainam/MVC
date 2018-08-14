<?php
// include 'system/define/define.php' ;
// include 'controller/controller.php' ;

include 'system/autoload.php' ;

// đường dẫn của MVC web có dạng : /?controller=xxx&action=yyy
// controller là file xxx_controller tương ứng trong folder controller. Note: tên file cũng chính là tên đối tượng
// action là function yyy bên trong file xxx_controller
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
		// include_once ('controller/hethong_controller.php');
		$controller = new hethong_controller();
		$controller->_404();
	}
} else {
	// include ('controller/hethong_controller.php');
	$controller = new hethong_controller();
	$controller->_404();
}

?>
