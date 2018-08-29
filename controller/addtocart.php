<?php 
session_start();
require_once ('./../system/config/dbconfig.php');
require_once ('./../system/libs/funcs.php');
require_once ('./../system/core/Database.php');
require_once ('./../model/donhang_model.php');

$cart = new donhang_model();

if($cart->addtocart($_POST['prod_id']))
	echo json_encode(array('soluong'=>$cart->countcart(),'state'=>'ok'));
else
	echo json_encode(array('soluong'=>0,'state'=>'error'));

?>