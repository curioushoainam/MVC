<?php 
class hethong_model extends Database{
	function dsslider(){
		$sql = 'SELECT * FROM `media_slider` WHERE trang_thai=1' ;
		$this->setQuery($sql);
		return $this->loadRows();
	}

	function dsbrand(){
		$sql = 'SELECT * FROM `product_supplier` WHERE trang_thai=1' ;
		$this->setQuery($sql);
		return $this->loadRows();
	}
}

?>