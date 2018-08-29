<?php 
session_start();
require_once ('./../system/config/dbconfig.php');
require_once ('./../system/libs/funcs.php');
require_once ('./../system/core/Database.php');
require_once ('./../model/donhang_model.php');

$cart = new donhang_model();

$total = 0;
if($cart->deltocartajax($_POST['prod_id'], $total))
	echo json_encode(array('state'=>'ok', 'prod_id'=>$_POST['prod_id'], 'total'=>$total));
else
	echo json_encode(array('state'=>'error'));

?>