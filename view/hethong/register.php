<?php 
$validation = new Validation();
$ht_model = new hethong_model();
$dbfunc = new DatabaseFuncs();

$reg = array(
	'ho_ten'=>NULL,
	'dia_chi'=>NULL,
	'sdt'=>NULL,
	'email'=>NULL,
	'ten_dang_nhap'=>NULL,
	'password'=>NULL
);

$ho_tenErr=$dia_chiErr=$emailErr=$ten_dang_nhapErr=$passwordErr=$sdtErr=NULL;
$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["register"]) && $_POST["register"]){
		
		if(isset($_POST["ho_ten"]) && $_POST["ho_ten"]){
			if($validation->isCommonChars($_POST["ho_ten"]))
				$reg['ho_ten'] = $_POST["ho_ten"];
			else 
				$ho_tenErr = 'Họ tên không hợp lệ';
		} else 
			$ho_tenErr = 'Họ tên không tồn tại';

		if(isset($_POST["dia_chi"]) && $_POST["dia_chi"]) {			
			$reg['dia_chi'] = $_POST["dia_chi"];			
		} else 
			$dia_chiErr = 'Họ tên không tồn tại';

		if(isset($_POST["sdt"])) {	
			if(!empty($_POST["sdt"])){
				if($validation->isPhone($_POST["sdt"]))
					$reg['sdt'] = $_POST["sdt"];
				else
					$sdtErr = 'Số điện thoại không hợp lệ';
			}						
		} 

		if(isset($_POST["email"]) && $_POST["email"]){
			if($validation->isEmail($_POST["email"]))
				$reg['email'] = $_POST["email"];
			else 
				$emailErr = 'Email không hợp lệ';
		} else 
			$emailErr = 'Email không tồn tại';

		if(isset($_POST["ten_dang_nhap"]) && $_POST["ten_dang_nhap"]){			
			if($ht_model->isAccAvail($_POST["ten_dang_nhap"]))
				$ten_dang_nhapErr = 'Tên đăng nhập đã tồn tại';
			else					
				$reg['ten_dang_nhap'] = $_POST["ten_dang_nhap"];							
		} else 
			$ten_dang_nhapErr = 'Tên đăng nhập không tồn tại';

		if(isset($_POST["password"], $_POST["password_confirmation"]) && $_POST["password"] && $_POST["password_confirmation"]){
			if($_POST["password"] == $_POST["password_confirmation"] ){
				if($validation->isPassword2($_POST["password"]))
					$reg['password'] = md5($_POST["password"]);
				else
					$passwordErr = 'Password không hợp lệ';								
			} else 
				$passwordErr = 'Password không trùng khớp';						
		} else 
			$passwordErr = 'Password không tồn tại';

		if(!($ho_tenErr||$dia_chiErr||$sdtErr||$emailErr||$ten_dang_nhapErr||$passwordErr)){
			$reg['ngay_tao'] = date('Y-m-d H:i:s');
			$reg['ngay_cap_nhat'] = NULL;
			$reg['xac_thuc'] = NULL;
			$result = $dbfunc->create('user', $reg);
			if($result)
				chuyentrang('?controller=hethong&action=login');
			else
				$msg = 'Đăng ký không thành công O_O';
		}
	}
}

?>

<div class="container">
	<div class="col-xs-12" style="text-align: center;"><h5 style="color: lightgreen "><?= $msg ?></h5></div>
    <div class="row centered-form">
	    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
	    	<div class="panel panel-default">
	    		<div class="panel-heading">
		    		<h3 class="panel-title">Đăng ký tài khoản <small>It's free!</small></h3>
		 			</div>
		 			<div class="panel-body">
		    		<form role="form" action="" method="post">	

		    			<div class="form-group">
		    				<span style="color: red"><?= $ho_tenErr ?></span>
		    				<input type="text" name="ho_ten" id="ho_ten" class="form-control input-sm" placeholder="Họ tên" value="<?= $reg['ho_ten'] ?>">
		    			</div>

		    			<div class="form-group">
		    				<span style="color: red"><?= $dia_chiErr ?></span>
		    				<input type="text" name="dia_chi" id="dia_chi" class="form-control input-sm" placeholder="Địa chỉ" value="<?= $reg['dia_chi'] ?>">
		    			</div>

		    			<div class="form-group">
		    				<span style="color: red"><?= $sdtErr ?></span>
		    				<input type="text" name="sdt" id="sdt" class="form-control input-sm" placeholder="Số điện thoại (nếu có)" value="<?= $reg['sdt'] ?>">
		    			</div>	    		

		    			<div class="form-group">
		    				<span style="color: red"><?= $emailErr ?></span>
		    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="<?= $reg['email'] ?>">
		    			</div>

		    			<div class="form-group">
		    				<span style="color: red"><?= $ten_dang_nhapErr ?></span>
		    				<input type="text" name="ten_dang_nhap" id="ten_dang_nhap" class="form-control input-sm" placeholder="Tên đăng nhập" value="<?= $reg['ten_dang_nhap'] ?>">
		    			</div>

		    			<div class="row">		    					
	    					<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">		    						
		    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password từ 6-15 ký tự">
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
		    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
		    					</div>
		    				</div>
		    				<div>
		    					<span style="color: red; padding-left: 20px"><?= $passwordErr ?></span>
		    				</div>		    					    				
		    			</div>		    			
		    			
		    			<input type="submit" name="register" value="Đăng ký" class="btn btn-info btn-block">

		    			<div style="margin: 20px auto">
		    				<span>Đã có tài khoản &nbsp => &nbsp&nbsp </span><a href="<?= href('home',array('alias'=>'home'), $seo) ?>">Đăng nhập</a>
		    			</div>
		    		
		    		</form>
		    	</div>
    		</div>
		</div>
	</div>
</div>