<?php 
$validation = new Validation();
$dbfunc = new DatabaseFuncs();
$ht_model = new hethong_model();

$ten_dang_nhap=NULL;

$ten_dang_nhapErr=$passwordErr=NULL;
$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['login']) && $_POST['login']){
       if(isset($_POST['ten_dang_nhap'], $_POST['password']) && $_POST['ten_dang_nhap'] && $_POST['password']){
            if($ht_model->isAccAvail($_POST["ten_dang_nhap"])){
                $ten_dang_nhap = $_POST["ten_dang_nhap"];
                if($ht_model->checkpassword($_POST['ten_dang_nhap'], $_POST['password'])){
                    $_SESSION['login'] = true;
                    $_SESSION['account'] = $_POST['ten_dang_nhap'];
                    if (isset($_POST['save']) && $_POST['save']) {  
                        setcookie('account', $_POST['ten_dang_nhap'], time() + (86400 *90), '/', DOMAIN);    // save 90 days
                        setcookie('password', $_POST['password'], time() + (86400 *90), '/', DOMAIN); 
                    }
                    // chuyentrang('?controller=hethong&action=home');
                    chuyentrang(href('home',array('alias'=>'home'), $seo));
                } else 
                    $passwordErr = 'Mật khẩu không đúng';
            } else
                $ten_dang_nhapErr = 'Tài khoản không tồn tại';
       } 
    }
}

?>


<div class="container" style="margin: 100px auto">
    <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-title">Đăng nhập <small>Welcome back !</small></h3>
                    </div>
                    <div class="panel-body">
                    <form role="form" action="" method="post">                        

                        <div class="form-group">
                            <span style="color: red"><?= $ten_dang_nhapErr ?></span>
                            <input type="text" name="ten_dang_nhap" id="ten_dang_nhap" class="form-control input-sm" placeholder="Tên đăng nhập" value="<?= $ten_dang_nhap ?>" style="width: 100%">
                        </div>
                        <div class="form-group">
                            <span style="color: red"><?= $passwordErr ?></span>
                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" style="width: 100%">
                        </div>

                        <input type="submit" name="login" value="Đăng nhập" class="btn btn-info btn-block">

                        <div style="margin: 10px">
                            <input type="checkbox" name="save" value="true"><span>&nbsp&nbsp&nbsp Nhớ đăng nhập</span>    
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>