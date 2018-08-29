<?php 
class donhang_model extends Database {
	function getProdInfo($prod_id){
		$sql = 'SELECT * FROM `products` WHERE `trang_thai`=1 AND `ma`=?';
		$this->setquery($sql);
		return $this->loadrow(array($prod_id));
	}

	function setcart() {
		//lưu giỏ hàng vào session
		if (!isset($_SESSION['cart']))
			$_SESSION['cart'] = array();
	}

	function addtocart($prod_id){
		if(!is_numeric($prod_id) || $prod_id==0 ) return false;

		// đọc thông tin sản phẩm để đảm bảo sp tồn tại và lấy thông tin
		$item = $this->getProdInfo($prod_id);
		if(!($item && $item->so_luong > 0)) return false;

		// tạo dữ liệu để thêm vào giỏ hàng
		$itemadd = array(
			'ma'=>$item->ma,
			'ten'=>$item->ten,
			'hinh'=>explode("|",$item->hinh)[0],
			'dongia'=>$item->don_gia,
			'soluong'=>1	
		);

		// trước khi thêm, ktra sự tồn tại của giỏ hàng
		if(isset($_SESSION['cart'],$_SESSION['cart'][$item->ma]))
			// qty increases
			$_SESSION['cart'][$item->ma]['soluong'] += 1;
		else 
			$_SESSION['cart'][$item->ma] = $itemadd;

		return true;
	}

	function deltocart($prod_id){
		if(!is_numeric($prod_id) || $prod_id==0 ) return false;
		
		if(isset($_SESSION['cart'],$_SESSION['cart'][$prod_id])){
			unset($_SESSION['cart'][$prod_id]);
			return true;
		} else
			return false;

	}

	function deltocartajax($prod_id, &$total){
		if(!is_numeric($prod_id) || $prod_id==0 ) return false;
		
		if(isset($_SESSION['cart'],$_SESSION['cart'][$prod_id])){
			unset($_SESSION['cart'][$prod_id]);
			$total = $this->total();
			return true;
		} else
			return false;

	}

	function updatetocart($data){
		if(!($data && is_array($data))) return false;

		foreach ($data as $ma => $soluong){			
			$_SESSION['cart'][$ma]['soluong'] = $soluong;
		}
		return true;
	}

	function updatetocartajax($prod_id, $qty, &$subtotal, &$total){
		if(!$prod_id) return false;
		if(!isset($subtotal, $total, $qty)) return false;

		if(isset($_SESSION['cart'], $_SESSION['cart'][$prod_id])){		
			$_SESSION['cart'][$prod_id]['soluong'] = $qty;
			$subtotal =  $_SESSION['cart'][$prod_id]['soluong'] * $_SESSION['cart'][$prod_id]['dongia'];
			$total = $this->total();
			return true;
		} else 
			return false;
	}

	function countcart(){
		if(isset($_SESSION['cart']) && $_SESSION['cart'])
			return count($_SESSION['cart']);
		else
			return 0;
	}	

	function total(){
		$total = 0;
		foreach ($_SESSION['cart'] as $item){
			$total += $item['dongia'] * $item['soluong'];
		}
		return $total;
	}

	function getUserInfo($account){
		$sql = 'SELECT * FROM `user` WHERE `trang_thai`=1 AND `xac_thuc`=1 AND `ten_dang_nhap`=?';
		$this->setquery($sql);
		return $this->loadrow(array($account));
	}

	function setorder() {
		//lưu giỏ hàng vào session
		if (!isset($_SESSION['order']))
			$_SESSION['order'] = array();
	}

	function getInvoice($account, $orderID){
		$sql = 'SELECT * FROM `invoice` WHERE `status`=1 AND `account`=? AND `orderID`=?';
		$this->setquery($sql);
		return $this->loadrow(array($account, $orderID));
	}
}





?>