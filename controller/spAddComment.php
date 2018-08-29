<?php 
require_once ('./../system/config/dbconfig.php');
require_once ('./../system/core/Database.php');
require_once ('./../model/sanpham_model.php');

require_once ('./../system/libs/funcs.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['prod_id'], $_POST['ten'], $_POST['nd'], $_POST['ma_cha']) && $_POST['prod_id'] && $_POST['nd'] && $_POST['ten']){
		$comment = new sanpham_model();
		$result = $comment->addComment(array($_POST['prod_id'], $_POST['ma_cha'], $_POST['nd'], $_POST['ten']));
		if($result)
			echo json_encode(array('error'=>'0'));		// false : no error; true: error
		else
			echo json_encode(array('error'=>'1'));
	}else 
	echo json_encode(array('error'=>'1'));
} 

?>