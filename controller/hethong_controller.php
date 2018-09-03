<?php 
class hethong_controller extends controller {

	function __construct(){
		$this->pathview = 'view/hethong/';
	}

	function home(){		
		$ht_model = new hethong_model();		
		$sliders = $ht_model->dsslider();
		$brands = $ht_model->dsbrand();
		
		$sp_model = new sanpham_model();
		$newProducts = $sp_model->newProducts(10);
		$topNew = $sp_model->newProducts(3);
		$topSell = $sp_model->listTopsell(3);

		if(isset($_SESSION['topView']) && $_SESSION['topView']){
			$topView = $sp_model->topView($_SESSION['topView'],3);
		}			
		else
			$topView = '';

		$data = array(
			'sliders'=>$sliders,
			'brands'=>$brands,
			'newProducts'=>$newProducts,
			'topNew'=>$topNew,
			'topSell'=>$topSell,
			'topView'=>$topView			
		);

		$this->render('home',$data);
	}

	function contact(){		
		$ht_model = new hethong_model();		
		$generalInfo = $ht_model->generalInfo();
		$generalInfo = json_decode($generalInfo, 512);
		$map = $generalInfo['map'];
		$data = array(			
			'map' => $map
		);
		// include 'view/hethong/contact.php';		
		$this->render('contact',$data);
	}

	function about(){
		$ht_model = new hethong_model();
		$aboutus = $ht_model->aboutus();
		$data = array(			
			'aboutus' => $aboutus
		);
		// include 'view/hethong/contact.php';
		$this->render('about',$data);
	}

	function _404(){
		// include 'view/hethong/404.php';	
		$this->render('404',array(),'emptylayout');
	}

	function login(){
		$this->render('login');
	}

	function register(){
		$this->render('register',array(),'accountlayout');
	}

	function account(){
		$accInfo = '';
		if(isset($_SESSION['account']) && $_SESSION['account']){
			$ht_model = new hethong_model();
			$accInfo = $ht_model->AccInfo($_SESSION['account'])[0];
		}
		
		$data = array(
			'accInfo' => $accInfo
		);
		$this->render('account', $data, 'accountlayout');
	}
}

?>