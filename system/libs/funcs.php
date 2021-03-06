<?php
//<!-- lưu tất cả các function dùng chung cho website -->
function viewArr($ar){
    echo '<pre>';
    print_r($ar);
    echo '</pre>';
}

function login(){ 
    require_once('./system/config/dbconfig.php');
    require_once('./system/core/Database.php');
    require_once('./model/hethong_model.php');
    $ht_model = new hethong_model();   
    
	if(isset($_COOKIE['user'], $_COOKIE['password']) && $_COOKIE['user'] &&  $_COOKIE['password']){
        if($ht_model->checkpassword($_COOKIE['user'], $_COOKIE['password'])){
            $_SESSION['user_login'] = true;
            $_SESSION['user'] = $_COOKIE['user'];       
        } else {
            unset($_SESSION['user']);
            unset($_SESSION['password']);            
        }
	}
}

function checkpermission(){
    require_once ('./class/Process_account.php');
    $process_account = new Process_account();
    require_once ('./class/Permission.php');
    $permission = new Permission();    

    if (isset($_GET['view']) && $_GET['view']){
        $curlink = explode("_",$_GET['view'])[0];
        if ($curlink == 'logout' || $curlink == 'error' || $curlink == 'home')
            return true;
    } else 
        return true;        // ai cũng vào trang chủ được


    if (isset($_SESSION['user']) && $_SESSION['user']) {
        $mng = $process_account->getMngLevel($_SESSION['user']);

        // manager có toàn quyền
        if(isset($mng) && $mng)
            return true;
        // việc set quyền chỉ cho manager thực hiện
        if ($curlink == 'adminAssign'){
            return false;
        }

        $links = $permission->readLinkOfUser($process_account->getID($_SESSION['user'])); 

        foreach ($links as $link){           
            if($link->link == $curlink)
                return true;
        }
        return false;

    } else 
        return false;
}  


function notify(){
    if (isset($_SESSION['msg']) && $_SESSION['msg']){
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    } else
        $msg = '';

    return $msg;
}


function chuyentrang($link){
    header('location: '.$link);
    exit();
}

/*
$file : $_FILES từ phía client gửi lên
$path : thư mục chứa file sau khi đc upload thành công
$name: tên file sẽ được lưu
$maxsize: kích thước lớn nhất cho phép upload, đơn vị MB
$extallow: loại file được phếp upload lên server
return : array("error" => "", "mesg" => "") với error = 1 : có lỗi, error = 0 : không lỗi 

*/
function upload_file($file,$path,$name='file_',$maxsize = 1,$extallow=array('jpg','jpge','png','gif'), $i=''){
    $result = array("error" => "0", "msg" => "");    
    //kiem tra file ng dung chọn đã đc đẩy lên tmp server hay chưa  
    if (!($file && is_array($file) && count($file)==5)) {
        $result["error"] = 1;
        $result["mesg"] = 'lỗi file tmp server';
        return $result; 
    }   
    
    //kiêm tra kich thươc file  
    $limsize = $maxsize * 1024 * 1024;   
    if(($file['size']<=0) || ($file['size']>$limsize)){
        $result["error"] = 1;
        $result["msg"] = 'lỗi kích thước file';        
        return $result; 
    }
    
    // tách đuôi file và kiểm tra
    $exts = explode('.',$file['name']); 
    $ext = strtolower($exts[count($exts)-1]);       
    if (!(in_array($ext, $extallow))){
        $result["error"] = 1;
        $result["msg"] = 'lỗi file type';        
        return $result;
    }
    
    // tạo tên file để quản lý
    $name .= '_'.time().$i;    
    
    // tạo fullpath upload lên server
    $fullpath = $path.'/'.$name.'.'.$ext;
    if(move_uploaded_file($file['tmp_name'], $fullpath)){
        $result["msg"] = $name.'.'.$ext;
        return $result;
    } else {
        $result["error"] = 1;
        $result["msg"] = 'lỗi đường dẫn lưu trữ';
        return $result;
    }   
}

/*
Chuyển đổi các [file] post lên thành mảng các file với mỗi file có 
*/
function re_files_array($file_post){
    $newArray = array();   
    
    foreach($file_post as $keys => $all_vals){
        foreach($all_vals as $i => $val){
            $newArray[$i][$keys] =  $val;
        }           
    } 
    return $newArray;
}

function checkFile($file,$maxsize = 1,$extallow=array('jpg','jpge','png','gif')){
    $err = false;    
    //kiem tra file ng dung chọn đã đc đẩy lên tmp server hay chưa  
    if (!($file && is_array($file) && count($file)==5)) {        
        $err = 'lỗi file tmp server';
        return $err; 
    }   
    
    //kiêm tra kich thươc file  
    $limsize = $maxsize * 1024 * 1024;       
    if(($file['size']<=0) || ($file['size']>$limsize)){        
        $err = 'lỗi kích thước file';        
        return $err; 
    }
    
    // tách đuôi file và kiểm tra
    $exts = explode('.',$file['name']); 
    $ext = strtolower($exts[count($exts)-1]);       
    if (!(in_array($ext, $extallow))){        
        $err = 'lỗi file type';        
        return $err;
    } 
    return $err;
}

function upfile($file,$path,$name='file_'){    
    
    // tách đuôi file và kiểm tra
    $exts = explode('.',$file['name']); 
    $ext = strtolower($exts[count($exts)-1]);

    // tạo tên file để quản lý
    $name .= time();    
    
    // tạo fullpath upload lên server
    $fullpath = $path.'/'.$name.'.'.$ext;
    if(move_uploaded_file($file['tmp_name'], $fullpath)){
        $result = $name.'.'.$ext;
        return $result;
    } else {        
        return false;
    }   
}
 
/*
Upload multiple files to server
*/
function myuploads($file,$path,&$kq,&$loi,$namein = 'file_',$maxsize=1,$extallow=array('jpg','png','gif')){
    $kq = array();
    $loi=array();
    
    if(is_array($file) && is_array($file['name'])){
        foreach($file['name'] as $i=>$name){
            //tạo mảng các thông tin cua 1 file de upload
            $item = array(
                            'name'=>$name,
                            'tmp_name'=>$file['tmp_name'][$i],
                            'error'=>$file['error'][$i],
                            'size'=>$file['size'][$i],
                            'type'=>$file['type'][$i]           
                          );
            $err = checkFile($item,$maxsize,$extallow);
            if(!$err){
                $kqi = upfile($item,$path,$namein.$i);
                if($kqi)
                    $kq[] = $kqi;
                else
                    $loi[] = $name.' => Upload không thành công';
            } else {
                $loi[] = $name .' => '. $err;
            }             
        }
        return true;            
    }else
        return false;
}

function menu_active($menu_name = ''){
    if ( isset($_GET['action'])){
        return $_GET['action'] == $menu_name ? 'active':'';
    }
}

// the function selects using pathname in alias or origin
function href($type, $item=array(), $seo){
    if($seo){
        switch ($type) {
            case 'home':
                return 'home';
            case 'about':
                return $item['alias'];
            case 'contact':
                return $item['alias'];


            case 'cart':
                return $item['alias'];
            case 'checkout':
                return $item['alias'];
            case 'preview':
                return $item['alias'];
            case 'invoice':
                return $item['alias'].'-'.$item['orderID'];


            case 'dsSanpham':
                return $item['alias'];
            case 'chitiet':
                return $item['alias'].'_'.$item['ma'];

            case 'login':
                return $item['alias'];
            case 'register':
                return $item['alias'];
            case 'account':
                return $item['alias'];

              
        }
    } else {
        switch ($type) {
            case 'home':
                return 'index.php?controller=hethong&action=home';
            case 'about':
                return 'index.php?controller=hethong&action=about';
            case 'contact':
                return 'index.php?controller=hethong&action=contact';


            case 'cart':
                return 'index.php?controller=donhang&action=cart';
            case 'checkout':
                return 'index.php?controller=donhang&action=checkout';
            case 'preview':
                return 'index.php?controller=donhang&action=preview';
            case 'invoice':
                return 'index.php?controller=donhang&action=invoice&orderID='.$item['orderID'];


            case 'dsSanpham':
                return 'index.php?controller=sanpham&action=dsSanpham';
            case 'chitiet':
                return 'index.php?controller=sanpham&action=chitiet&id='.$item['ma'].'&alias='.$item['alias'];

            case 'login':
                return 'index.php?controller=hethong&action=login';
            case 'register':
                return 'index.php?controller=hethong&action=register';
            case 'account':
                return 'index.php?controller=hethong&action=account';

        }
    }
} 

?>
