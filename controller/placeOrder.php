<?php 
session_start();
require_once ('./../system/config/dbconfig.php');
require_once ('./../system/libs/funcs.php');
require_once ('./../system/core/Database.php');
require_once ('./../system/core/DatabaseFuncs.php');

$db = new DatabaseFuncs();

if(isset($_POST['placeorder']) && $_POST['placeorder']){
		if(!(isset($_SESSION['orderID']) && $_SESSION['orderID']))
			$_SESSION['orderID'] = substr($_SESSION['account'],0,3).time();

	$total = 0;
	foreach($_SESSION['cart'] as $item){
		$dongia = $item['dongia'] ? $item['dongia'] : 0;    
	    $soluong = $item['soluong'] ? $item['soluong'] : 0;
	    $subtotal = $dongia * $soluong;
	    $total += $subtotal;
	}

	$order = array();
	if($total == $_POST['placeorder']){
		$order['account'] = $_SESSION['account'];
		$order['orderID'] = $_SESSION['orderID'];
		$order['orderInfo'] = json_encode($_SESSION['order']);
		$order['cart'] = json_encode($_SESSION['cart']);
		$order['amount'] = $total;
		$order['createdDate'] = date('Y-m-d H:i:s');
		$order['paymentDue'] = Date('y:m:d', strtotime("+14 days"));		
		$order['status'] = 1;
		$order['updatedDate'] = NULL;

		$result = $db->create('invoice',$order);
		if($result){
			unset($_SESSION['cart']);
			unset($_SESSION['order']);
			// echo json_encode(array('state'=>'ok')); 
			chuyentrang('../?controller=donhang&action=invoice&orderID='.$order['orderID']);
		}
		else{
			// echo json_encode(array('state'=>'error'));
			$_SESSION['errmsg'] = 'Đặt hàng không thành công. Xin thử lại';
			chuyentrang('../?controller=donhang&action=preview');
		}
			

	} else {
		// echo json_encode(array('state'=>'error'));
		$_SESSION['errmsg'] = 'Xin kiểm tra lại giá trị total';
		chuyentrang('../?controller=donhang&action=preview');
	}
} else {
		// echo json_encode(array('state'=>'error'));
		$_SESSION['errmsg'] = 'Thông tin đặt hàng không hợp lệ';
		chuyentrang('../?controller=donhang&action=preview');

}

?>