<?php 
session_start();
require_once ('./../system/config/dbconfig.php');
require_once ('./../system/libs/funcs.php');
require_once ('./../system/core/Database.php');
require_once ('./../model/donhang_model.php');

$dh_model = new donhang_model();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['promocode']) && $_POST['promocode']){
		if(isset($_SESSION['order'])){
			$_SESSION['order']['promocode'] = $_POST['promocode'];
			echo json_encode(array('state'=>'ok'));	
		} else
			echo json_encode(array('state'=>'error'));	
	}

	if(isset($_POST['giftmsg']) && $_POST['giftmsg']){
		if(isset($_SESSION['order'])){
			$_SESSION['order']['giftmsg'] = $_POST['giftmsg'];
			echo json_encode(array('state'=>'ok'));	
		} else
			echo json_encode(array('state'=>'error'));	
	}

	if(isset($_POST['pay']) && $_POST['pay']){
		if(isset($_SESSION['order'])){
			$_SESSION['order']['pay'] = $_POST['pay'];
			echo json_encode(array('state'=>'ok'));	
		} else
			echo json_encode(array('state'=>'error'));	
	}

	if(isset($_POST['ho_ten'], $_POST['dia_chi'], $_POST['phone']) && $_POST['ho_ten'] && $_POST['dia_chi'] && $_POST['phone']){
		if(isset($_SESSION['order'])){
			$_SESSION['order']['ho_ten'] = $_POST['ho_ten'];
			$_SESSION['order']['dia_chi'] = $_POST['dia_chi'];
			$_SESSION['order']['phone'] = $_POST['phone'];
			echo json_encode(array('state'=>'ok'));	
		} else
			echo json_encode(array('state'=>'error'));	
	}
}

?>	