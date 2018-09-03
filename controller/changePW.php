<?php 
session_start();
require_once('./../system/config/dbconfig.php');
require_once('./../system/libs/funcs.php');
require_once('./../system/core/Database.php');
require_once('./../system/core/DatabaseFuncs.php');
require_once('./../system/core/Validation.php');
require_once('./../model/hethong_model.php');
require_once('./../controller/controller.php');
require_once('./../controller/hethong_controller.php');

$validation = new Validation();
$ht_model = new hethong_model();
$dbfunc = new DatabaseFuncs();

$update = array(	
	'password'=>NULL,
	'ngay_cap_nhat'=>NULL
);

$passwordErr=NULL;

if(isset($_POST["changePW"]) && $_POST["changePW"]){
	if(isset($_POST["password_old"],$_POST["password"],$_POST["password_confirmation"]) && $_POST["password_old"] && $_POST["password"] && $_POST["password_confirmation"]){
		if($ht_model->checkpassword($_SESSION['account'], $_POST["password_old"])){
			if($_POST["password"] == $_POST["password_confirmation"] ){
				if($validation->isPassword2($_POST["password"]))
					$update['password'] = md5($_POST["password"]);
				else
					$passwordErr = 'Password không hợp lệ';								
			} else 
				$passwordErr = 'Password không trùng khớp';
		} else 
			$passwordErr = 'Password cũ không đúng';
	} else 
		$passwordErr = 'Thiếu thông tin';

	if(!$passwordErr){		
		$update['ngay_cap_nhat'] = date('Y-m-d H:i:m');		
		$result = $dbfunc->update('user', $update,array('ten_dang_nhap'=>$_SESSION['account']));
		if($result)
			$_SESSION['errmsg'] = 'Thay đổi mật khẩu thành công ^-^';
		else
			$_SESSION['errmsg'] = 'Thay đổi mật khẩu thất bại O_O';
	} else {
		$_SESSION['errmsg'] = $passwordErr;
	}
}
chuyentrang('./../?controller=hethong&action=account');
?>