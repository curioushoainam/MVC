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

	function menu(){
		$sql = 'SELECT * FROM `menu` WHERE trang_thai=1' ;
		$this->setQuery($sql);
		return $this->loadRows();
	}

	function isAccAvail($account){
		$sql = 'SELECT ma FROM `user` WHERE ten_dang_nhap= ? ' ;
		$this->setQuery($sql);
		if ($this->loadRow(array($account)))
			return true;
		else 
			return false;
	}

	function checkpassword($account, $password){
		$sql = 'SELECT password FROM `user` WHERE ten_dang_nhap= ? ' ;
		$this->setQuery($sql);
		$pw = $this->loadRow(array($account));
		if ($pw)
			return md5($password) == $pw->password;
		else 
			return false;
	}

	function addSubcribe($email){
		$sql = 'INSERT INTO `subscribe` (`email`, `ngay_tao`, `trang_thai`) VALUES (?, NOW(), 1)' ;
		$this->setQuery($sql);
		return $this->execute(array($email));
	}
}

?>