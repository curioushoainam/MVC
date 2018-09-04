<?php 
class sanpham_model extends database {
	function newProducts($qty = '*'){
		$sql = 'SELECT ma, ten, alias, hinh, don_gia, don_gia_cu FROM `products` WHERE trang_thai=1 ORDER BY ma DESC LIMIT 0,'.$qty ;
		$this->setQuery($sql);
		return $this->loadRows();
	}

	function listProducts($start='', $limit=''){
		if (isset($start, $limit) && $limit){
			$orderby = ' ORDER BY ma DESC LIMIT '.$start.','.$limit ;
		} else 
			$orderby = '';
		$sql = 'SELECT ma, ten, alias, hinh, don_gia, don_gia_cu FROM `products` WHERE trang_thai=1 '.$orderby;
		$this->setQuery($sql);
		return $this->loadRows();
	}

	function totalRecords(){		
		$sql = 'SELECT COUNT(ma) totalRecords FROM `products` WHERE trang_thai=1';
		$this->setQuery($sql);
		return $this->loadRow()->totalRecords;
	}

	function prodDetail($product_id, $alias=''){
		if($alias){
			$sql = 'SELECT `ma`, `ten`, `noi_dung_chi_tiet`, `don_gia`, `don_gia_cu`, `danh_sach_hinh`  FROM `products` WHERE trang_thai=1 AND ma=? AND alias=?';
			$input = array($product_id, $alias);
		} else {
			$sql = 'SELECT `ma`, `ten`, `noi_dung_chi_tiet`, `don_gia`, `don_gia_cu`, `danh_sach_hinh`  FROM `products` WHERE trang_thai=1 AND ma=?';
			$input = array($product_id);
		}
		$this->setQuery($sql);
		return $this->loadRow($input);
	}

	function prodArticle($product_id){
		$sql = 'SELECT `ma`, `chi_tiet`  FROM `articles` WHERE trang_thai=1 AND ma_sp=?';
		$this->setQuery($sql);
		return $this->loadRow(array($product_id));
	}

	function addComment($contents=array()){
		$sql = 'INSERT INTO `comments` (`ma_sp`, `ma_cha`, `noi_dung`, `ten`, `isNew`, `isAccept`, `ngay_tao`, `ngay_duyet`) VALUES (?, ?, ?, ?, 1, NULL, NOW(), NULL)';
		$this->setQuery($sql);
		return $this->execute($contents);
	}

	function readComment($prod_id, $ma_cha){
		$sql = 'SELECT `ma`, `ma_sp`, `ma_cha`, `noi_dung`, `ten`, `ngay_tao` FROM `comments` WHERE isAccept=1 AND ma_sp=? AND ma_cha=? ORDER BY ngay_tao DESC';
		$this->setQuery($sql);
		return $this->loadRows(array($prod_id, $ma_cha));
	}

	function listTopsell($qty = '*'){
			
		$sql = 'SELECT ma, ten, alias, hinh, don_gia, don_gia_cu FROM `products` WHERE trang_thai=1 & topsell=1 ORDER BY ngay_tao ASC LIMIT 0,'.$qty ;
		$this->setQuery($sql);
		return $this->loadRows();
	}

	function topView($listID = array(),$qty = ''){
		$limit = '';
		if($qty)
			$limit = " LIMIT 0, ". $qty;
		$in  = str_repeat('?,', count($listID) - 1) . '?';
		$sql = "SELECT ma, ten, alias, hinh, don_gia, don_gia_cu FROM `products` where `ma` IN ($in)" . $limit;
		$this->setQuery($sql);
		return $this->loadRows($listID);
	}
}

?>
