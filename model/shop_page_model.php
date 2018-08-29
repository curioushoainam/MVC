<?php 
class shop_page_model extends Pagination{
	function __construct($totalrecord = 1){
		$config = array(
			        'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
			        'total_record'  => $totalrecord,      // Tổng số record
			        'limit'         => 8,                // limit
			        'link_full'     => '?controller=sanpham&action=dsSanpham&page={page}',// Link full có dạng như sau: domain/com/page/{page}
			        'link_first'    => '?controller=sanpham&action=dsSanpham',   // Link trang đầu tiên       
			    );
		$this->init($config);
	}
}

class shop_page_model_ajax extends Pagination{
	function __construct($totalrecord = 1){
		$config = array(
			        'current_page'  => isset($_POST['page']) ? $_POST['page'] : 1, // Trang hiện tại
			        'total_record'  => $totalrecord,      // Tổng số record
			        'limit'         => 8,                // limit
			        'link_full'     => '#',// Link full có dạng như sau: domain/com/page/{page}
			        'link_first'    => '#',   // Link trang đầu tiên       
			    );
		$this->init($config);
	}
}
	
?>