<?php 
if(!(isset($_SESSION['account']) && $_SESSION['account'])){
	chuyentrang('?controller=hethong&action=home');
}

// $validation = new Validation();
// $ht_model = new hethong_model();
// $dbfunc = new DatabaseFuncs();

// $update = array(	
// 	'password'=>NULL,
// 	'ngay_cap_nhat'=>NULL
// );

// $passwordErr=NULL;
// $msg = '';

// if(isset($_POST["changePW"]) && $_POST["changePW"]){
// 	if(isset($_POST["password_old"],$_POST["password"],$_POST["password_confirmation"]) && $_POST["password_old"] && $_POST["password"] && $_POST["password_confirmation"]){
// 		if($ht_model->checkpassword($_SESSION['account'], $_POST["password_old"])){
// 			if($_POST["password"] == $_POST["password_confirmation"] ){
// 				if($validation->isPassword2($_POST["password"]))
// 					$update['password'] = md5($_POST["password"]);
// 				else
// 					$passwordErr = 'Password không hợp lệ';								
// 			} else 
// 				$passwordErr = 'Password không trùng khớp';
// 		} else 
// 			$passwordErr = 'Password cũ không đúng';
// 	} else 
// 		$passwordErr = 'Thiếu thông tin';

// 	if(!$passwordErr){		
// 		$update['ngay_cap_nhat'] = date('Y-m-d H:i:m');		
// 		$result = $dbfunc->update('user', $update,array('ten_dang_nhap'=>$_SESSION['account']));
// 		if($result)
// 			$msg = 'Thay đổi mật khẩu thành công ^-^';
// 		else
// 			$msg = 'Thay đổi mật khẩu thất bại O_O';
// 	}
// }


// viewArr($accInfo);
$ho_ten = isset($accInfo->ho_ten) ? $accInfo->ho_ten : '-';
$dia_chi = isset($accInfo->dia_chi) ? $accInfo->dia_chi : '-';
$sdt = isset($accInfo->sdt) ? $accInfo->sdt : '-';
$email = isset($accInfo->email) ? $accInfo->email : '-';
$ten_dang_nhap = isset($accInfo->ten_dang_nhap) ? $accInfo->ten_dang_nhap : '-';
$ngay_tao = isset($accInfo->ngay_tao) ? $accInfo->ngay_tao : '-';
$ngay_cap_nhat = isset($accInfo->ngay_cap_nhat) ? $accInfo->ngay_cap_nhat : '-';

?>

<div class="container">
	<div class="col-xs-12" style="text-align: center;"><h5 style="color: lightgreen "><?= isset($_SESSION['errmsg'])?$_SESSION['errmsg']:''; unset($_SESSION['errmsg']) ?></h5></div>
    <div class="row centered-form">
	    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
	    	<div class="panel panel-default">
	    		<div class="panel-heading">
		    		<h3 class="panel-title"> Thông tin tài khoản &nbsp&nbsp<span style="color: blue"><strong><?= $_SESSION['account'] ?></strong></span></h3>
		 			</div>
		 			<div class="panel-body">
		    		<form role="form" action="./controller/changePW.php" method="post">	

		    			<div class="form-group">
		    				<span >Họ tên</span>
		    				<input type="text" name="ho_ten" id="ho_ten" class="form-control input-sm" placeholder="Họ tên" value="<?= $ho_ten ?>" readonly>
		    			</div>

		    			<div class="form-group">
		    				<span>Địa chỉ</span>
		    				<input type="text" name="dia_chi" id="dia_chi" class="form-control input-sm" placeholder="Địa chỉ" value="<?= $dia_chi ?>" readonly>
		    			</div>

		    			<div class="form-group">
		    				<span>Phone</span>
		    				<input type="text" name="sdt" id="sdt" class="form-control input-sm" placeholder="Số điện thoại (nếu có)" value="<?= $sdt ?>" readonly>
		    			</div>	    		

		    			<div class="form-group">
		    				<span>Email</span>
		    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="<?= $email ?>" readonly>
		    			</div>

		    			<div class="form-group">
		    				<span>Tên đăng nhập</span>
		    				<input type="text" name="ten_dang_nhap" id="ten_dang_nhap" class="form-control input-sm" placeholder="Tên đăng nhập" value="<?= $ten_dang_nhap ?>" readonly>
		    			</div>

		    			<div class="row">		    					
	    					<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<span>Ngày tạo</span>		    						
		    						<input type="text" name="ngay_tao" id="ngay_tao" class="form-control input-sm" placeholder="ngày tạo" value="<?= $ngay_tao ?>" readonly>
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<span>Ngày cập nhật</span>
		    						<input type="text" name="ngay_cap_nhat" id="ngay_cap_nhat" class="form-control input-sm" placeholder="ngày cập nhật" value="<?= $ngay_cap_nhat ?>" readonly>
		    					</div>
		    				</div>		    					    					    				
		    			</div>

		    			<div class="form-group">		    			
		    				<input type="password" name="password_old" id="password_old" class="form-control input-sm" placeholder="Password cũ" >
		    			</div>

		    			<div class="row">		    					
	    					<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">		    						
		    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="New pw từ 6-15 ký tự">
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm new password">
		    					</div>
		    				</div>
		    				<!-- <div>
		    					<span style="color: red; padding-left: 20px"><?= $passwordErr ?></span>
		    				</div> -->		    					    				
		    			</div>		    			
		    			
		    			<input type="submit" name="changePW" value="Cập nhật password" class="btn btn-info btn-block">
		    			
		    			<div class="text-center"><br>
		    				<a href="?controller=hethong&action=home">Home</a>
		    			</div>
		    		</form>
		    	</div>
    		</div>
		</div>
	</div>
</div>