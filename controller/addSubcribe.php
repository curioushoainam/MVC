<?php 
require_once ('./../system/config/dbconfig.php');
require_once ('./../system/core/Validation.php');
require_once ('./../system/core/Database.php');
require_once ('./../model/hethong_model.php');

$validation = new Validation();

if(isset($_POST['email']) && $_POST['email'] ){
	if($validation->isEmail($_POST['email'])){
		$ht_model = new hethong_model();
		$res = $ht_model->addSubcribe($_POST['email']);

		if($res)
			echo json_encode(array('state'=>'ok'));
		else
			echo json_encode(array('state'=>'error'));
	} else
		echo json_encode(array('state'=>'error'));
} else
	echo json_encode(array('state'=>'error'));

?>