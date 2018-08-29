<?php 
session_start();
require_once ('./../system/config/dbconfig.php');
require_once ('./../system/libs/funcs.php');
require_once ('./../system/core/Database.php');
require_once ('./../model/donhang_model.php');

$cart = new donhang_model();

$subtotal = $total = 0;
if(isset($_POST['prod_id'], $_POST['soluong']) && $_POST['prod_id'] && $_POST['soluong']>=0){
	if($cart->updatetocartajax($_POST['prod_id'], $_POST['soluong'], $subtotal , $total))
		echo json_encode(array('state'=>'ok', 'prod_id'=>$_POST['prod_id'], 'subtotal'=>$subtotal, 'total'=>$total));
	else
		echo json_encode(array('state'=>'error'));
}
else
	echo json_encode(array('state'=>'error'));

?>